<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	GuideManV2
* @copyright	ManageGuides.com
* @author		Koenraad Vandezande - www.manageguides.com - koen@rioguides.com
* @license		GNU
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');



/**
* Create the SEF url.
*
* @param	array	&$query	List of the vars of the query.
*
* @return	array	Segments for the SEF route.
*/
function GuidemanCkBuildRoute(&$query)
{
	$view = null;
	$segments = array();
	if(isset($query['view']))
	{
		$view = $query['view'];

		// First segment always the view name
		$segments[] = $view;

		unset( $query['view'] );

		$configRoute = GuidemanRouteConfig();

		if (isset($configRoute[$view]))
		foreach($configRoute[$view] as $config)
		{
			$type = (isset($config['type'])?$config['type']:'var');
			$value = null;
			switch($type)
			{
				case 'layout':
					if (isset($query['layout']))
					{
						$value = $query['layout'];
						unset($query['layout']);
					}
					break;

				case 'slug':

					$id = null;
					if (isset($query['id']))
					{
						$id = $query['id'];
						unset($query['id']);
					}
					else if (isset($query['cid']))
					{
						$id = $query['cid'];
						unset($query['cid']);
					}

					if (is_array($id))
					{
						if (count($id))
							$id = $id[0];
						else
							$id = null;
					}

					if($id)
					{
						$value = $id;

						// Complete the ID with the slug (alias)
						if ((strpos($value, ':') === false) && (isset($config['aliasKey'])))
							$value = GuidemanBuildSlug($value, $view, $config['aliasKey']);

					}


					break;

				case 'var':
					if (!isset($config['name']))
						break;

					$varName = $config['name'];

					if (!isset($query[$varName]))
						break;

					$value = $query[$varName];

					if (is_array($value))
						$value = implode(',', $value);

					unset($query[$varName]);

					break;

				case 'filter':
					if (!isset($config['name']))
						break;

					$varName = 'filter_' . $config['name'];

					if (!isset($query[$varName]))
						break;

					$value = $query[$varName];
					unset($query[$varName]);


					if (is_array($value))
						$values = $value;
					else
						$values = explode(',', $value);

					$newValues = array();
					foreach($values as $value)
					{
						$newValue = $value;
						// Complete the ID with the slug (alias)
						if (strpos($value, ':') === false)
						{
							if (isset($config['aliasKey']) && isset($config['model']))
								$newValue = GuidemanBuildSlug($value, $config['model'], $config['aliasKey']);
						}

						$newValues[] = $newValue;
					}

					$value = implode(',', $newValues);

					break;
			}

			$segments[] = $value;
		}
	}

	return $segments;

}

/**
* Create the query request from the route.
*
* @param	array	$segments	Segments of the SEF route.
*
* @return	array	Query vars.
*/
function GuidemanCkParseRoute($segments)
{
	$vars = array();
	$view = null;

	if (count($segments))
		$vars['view'] = $view = $segments[0];

	$nextPos = 1;

	$count = count($segments);

	$configRoute = GuidemanRouteConfig();

	if (isset($configRoute[$view]))
	foreach($configRoute[$view] as $config)
	{
		if ($count <= $nextPos)
			break;

		$value = $segments[$nextPos];

		$type = (isset($config['type'])?$config['type']:'var');

		switch($type)
		{
			case 'layout':
				$vars['layout'] = $value;
				break;

			case 'slug':

				if (!isset($config['aliasKey']))
					break;

				$vars['id'] = GuidemanParseSlug($value, $view, $config['aliasKey']);

				break;

			case 'var':
				if (!isset($config['name']))
					break;

				$vars[$config['name']] = $value;
				break;

			case 'filter':

				if (!isset($config['name']))
					break;

				if (is_array($value))
					$values = $value;
				else
					$values = explode(',', $value);

				$newValues = array();
				foreach($values as $value)
				{
					$newValue = $value;

					if (isset($config['aliasKey']) && isset($config['model']))
						$newValue = GuidemanParseSlug($value, $config['model'], $config['aliasKey']);

					$newValues[] = $newValue;
				}

				$value = implode(',', $newValues);

				$filterName = 'filter_' . $config['name'];

				/*
				if (strpos($value, ','))
					$filterName .= '[]';
				*/

				$vars[$filterName] = $value;

				break;
		}


		$nextPos++;
	}

	return $vars;
}

/**
* Decode a slug alias and return the id of the element
*
* @param	string	$slug	Slug to decode.
* @param	string	$model	Model of the slug table.
* @param	string	$aliasKey	Alias of the table.
*
* @return	string	ID of the found item.
*/
function GuidemanCkParseSlug($slug, $model, $aliasKey)
{
	$parts = explode( ':', $slug );
	$id = $parts[0];

	if (is_numeric($id))
		return (int)$id;


	// When ID is only a string, search in database
	$item = GuidemanHelper::getData($model, array(
		'id' => array(
			$aliasKey => $id
		)
	));

	if ($item)
		return $item->id;

	return null;
}

/**
* Create a slug from an item id
*
* @param	string	$id	Item ID.
* @param	string	$model	Model of the slug table.
* @param	string	$aliasKey	Alias of the table.
*
* @return	string	Slug of the found item.
*/
function GuidemanCkBuildSlug($id, $model, $aliasKey)
{
	$item = GuidemanHelper::getData($model, array(

		// Select the alias field
		'select' => $aliasKey
	), $id);

	if ($item)
		return $id . ':' . $item->$aliasKey;

	// Not found, but bypass, and keep the current id value
	return $id;
}

/**
* Router configuration.
*
*
* @return	array	Router config.
*/
function GuidemanCkRouteConfig()
{
	return array(
		'accounts' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id',
				'model' => 'contact',
				'aliasKey' => 'alias'
			)
		),
		'accountsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'addresslabels' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			)
		),
		'addresslabel' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'addresses' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'address_label'
			)
		),
		'addressesitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'brands' => array(
			array(
				'type' => 'layout'
			)
		),
		'brandsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'businesstypes' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'country_id'
			)
		),
		'businesstype' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'categories' => array(
			array(
				'type' => 'layout'
			)
		),
		'category' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'contactlang' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id_state_id'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id_country_id'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id_driverguide',
				'model' => 'contact',
				'aliasKey' => 'alias'
			)
		),
		'contactlangitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'currencies' => array(
			array(
				'type' => 'layout'
			)
		),
		'currency' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'countries' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			)
		),
		'country' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'contacts' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			)
		),
		'contact' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'slug',
				'aliasKey' => 'alias'
			)
		),
		'doclabels' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'country_id'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			)
		),
		'doclabelsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'documents' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'label_id'
			)
		),
		'documentsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'jobs' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'company_id',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'client_id',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'requested_language'
			),
			array(
				'type' => 'filter',
				'name' => 'second_language_option'
			),
			array(
				'type' => 'filter',
				'name' => 'operator_name',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'main_guide',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'trip_leader',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'remunerations_company',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'invoicing_company',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			),
			array(
				'type' => 'filter',
				'name' => 'modified_by'
			),
			array(
				'type' => 'filter',
				'name' => 'my_joomla_user'
			),
			array(
				'type' => 'filter',
				'name' => 'my_joomla_access'
			)
		),
		'jobsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'jobitems' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'job_id'
			),
			array(
				'type' => 'filter',
				'name' => 'job_id_company_id',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'job_id_operator_name',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'transport',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'driver',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'guide',
				'model' => 'contact',
				'aliasKey' => 'alias'
			)
		),
		'jobitemsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'lang' => array(
			array(
				'type' => 'layout'
			)
		),
		'langitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'languages' => array(
			array(
				'type' => 'layout'
			)
		),
		'language' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'operators' => array(
			array(
				'type' => 'layout'
			)
		),
		'operator' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'phonelabels' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			)
		),
		'phonelabelsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'phones' => array(
			array(
				'type' => 'layout'
			)
		),
		'phonesitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'policies' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			),
			array(
				'type' => 'filter',
				'name' => 'language'
			)
		),
		'policy' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'slug',
				'aliasKey' => 'alias'
			)
		),
		'prices' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'currency'
			),
			array(
				'type' => 'filter',
				'name' => 'company',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'currency'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			),
			array(
				'type' => 'filter',
				'name' => 'modified_by'
			),
			array(
				'type' => 'filter',
				'name' => 'access'
			),
			array(
				'type' => 'filter',
				'name' => 'company',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'company',
				'model' => 'contact',
				'aliasKey' => 'alias'
			)
		),
		'price' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'services' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'company',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'state'
			)
		),
		'service' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'servicos' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'country'
			),
			array(
				'type' => 'filter',
				'name' => 'state'
			),
			array(
				'type' => 'filter',
				'name' => 'policy',
				'model' => 'policy',
				'aliasKey' => 'alias'
			)
		),
		'servico' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'social' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'labelid'
			)
		),
		'socialitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'sociallabels' => array(
			array(
				'type' => 'layout'
			)
		),
		'sociallabelsitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'states' => array(
			array(
				'type' => 'layout'
			)
		),
		'state' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'vehicles' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'filter',
				'name' => 'user_id',
				'model' => 'contact',
				'aliasKey' => 'alias'
			),
			array(
				'type' => 'filter',
				'name' => 'brand_id'
			),
			array(
				'type' => 'filter',
				'name' => 'created_by'
			)
		),
		'vehiclesitem' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		),
		'activepropertylists' => array(
			array(
				'type' => 'layout'
			)
		),
		'activepropertylist' => array(
			array(
				'type' => 'layout'
			),
			array(
				'type' => 'var',
				'name' => 'cid'
			)
		)
	);
}


