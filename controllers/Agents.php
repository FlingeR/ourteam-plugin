<?php namespace Fencus\OurTeam\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Fencus\OurTeam\Models\Agent;
use Flash;
/**
 * Agents Back-end Controller
 */
class Agents extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Fencus.OurTeam', 'ourteam', 'agents');
    }
    
    public function index_onDelete()
    {
    	if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
    
    		foreach ($checkedIds as $checkedId) {
    			if ((!$object = Agent::find($checkedId)))
    				continue;
    				$object->delete();
    		}
    
    		Flash::success('Successfully deleted those agents.');
    	}
    
    	return $this->listRefresh();
    }
}