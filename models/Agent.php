<?php namespace Fencus\OurTeam\Models;

use Model;

/**
 * Agent Model
 */
class Agent extends Model
{
	
    /**
     * @var string The database table used by the model.
     */
    public $table = 'fencus_ourteam_agents';
    
    /*
     * Validation
     */
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
    		'name' => ['required', 'max:255'],
    		'surname' => ['required', 'max:255'],
    		'email' => ['email', 'required', 'max:255'],
    ];
    
    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];
    
    
    
	use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var array Generate slugs for these attributes.
     */
    protected $slugs = [
    'slug' => ['name', 'surname']
];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
    		'image' => ['System\Models\File']
    ];
    public $attachMany = [];
    
    public function setUrl($pageName, $controller)
    {
    	$params = [
    			'id' => $this->id,
    			'slug' => $this->slug,
    	];
    
    	$this->url = $controller->pageUrl($pageName, $params);
    }

}