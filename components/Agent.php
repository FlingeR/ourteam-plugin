<?php namespace Fencus\OurTeam\Components;

use Cms\Classes\ComponentBase;
use Fencus\OurTeam\Models\Agent as AgentModel;

class Agent extends ComponentBase
{
	
	public $ourTeamPage;
	public $agent;

    public function componentDetails()
    {
        return [
            'name'        => 'Agent Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [
        		'slug' => [
                'title'       => 'slug',
                'description' => 'Unique Name',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
        		'ourTeamPage' => [
        				'title'       => 'Pagina de Our Team',
        				'description' => 'URL',
        				'type'        => 'dropdown',
        				'default'     => 'our-team',
        		],
        ];
    }
    
    public function getOurTeamPageOptions()
    {
    	return Page::sortBy('baseFileName')->lists('baseFileName', 'baseFileName');
    }
    
    public function onRun()
    {
    	try
    	{
    		$this->addCss('/plugins/fencus/ourteam/assets/css/ourteam.css');
    		$this->ourTeamPage = $this->property('ourTeamPage');
    		$slug = $this->property('slug');
    		$this->agent = AgentModel::where('slug', $slug)->firstOrFail();
    	}
    	catch(Exception $ex){
    		return redirect('/');
    	}
    }
    

}