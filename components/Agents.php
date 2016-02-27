<?php namespace Fencus\OurTeam\Components;

use Cms\Classes\ComponentBase;
use Fencus\OurTeam\Models\Agent as AgentModel;

class Agents extends ComponentBase
{

	public $agents;
	public $agentPage;
	
    public function componentDetails()
    {
        return [
            'name'        => 'Agents Component',
            'description' => ''
        ];
    }

    public function defineProperties()
    {
        return [
        		'agentPage' => [
        				'title'       => 'Pagina de Agentes',
        				'description' => 'URL',
        				'type'        => 'dropdown',
        				'default'     => 'agent',
        		],
        ];
    }
    
    public function getAgentPageOptions()
    {
    	return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
    
    public function onRun()
    {
    	$this->addCss('/plugins/fencus/ourteam/assets/css/ourteam.css');
    	$this->agentPage = $this->property('agentPage');
    	$this->agents = AgentModel::all();
    	foreach($this->agents as $agent)
    	{
    		$agent->setUrl($this->agentPage, $this->controller);
    	}
    }

}