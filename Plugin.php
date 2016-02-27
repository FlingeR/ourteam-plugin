<?php namespace Fencus\OurTeam;

use Backend;
use System\Classes\PluginBase;

/**
 * OurTeam Plugin Information File
 */
class Plugin extends PluginBase
{

	public $require = ['Fencus.HierarchyRelation'];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Our Team',
            'description' => '',
            'author'      => 'Fencus',
            'icon'        => 'icon-group',
        	'homepage'    => 'https://www.fencus.com.ar'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Fencus\OurTeam\Components\Agent' => 'agent',
        	'Fencus\OurTeam\Components\Agents' => 'agents',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'fencus.ourteam.access' => [
                'tab' => 'OurTeam',
                'label' => 'Access'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
	public function registerNavigation()
    {
        return [
            'ourteam' => [
                'label'       => 'Our Team',
                'url'         => Backend::url('fencus/ourteam/Agents'),
                'icon'        => 'icon-group',
                'permissions' => ['fencus.ourteam.*'],
                'order'       => 500,
            	'sideMenu' => [
            		'agents' => [
            				'label'       => 'Agents',
            				'icon'        => 'icon-user',
            				'url'         => Backend::url('fencus/ourteam/Agents'),
            				'permissions' => ['fencus.ourteam.*'],
            		],
            	],
            ],
        ];
    }

}
