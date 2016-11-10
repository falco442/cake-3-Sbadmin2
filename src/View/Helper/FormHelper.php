<?php

namespace AdminTheme\View\Helper;

use Cake\View\Helper\FormHelper as OldHelper;
use Cake\View\View;

class FormHelper extends OldHelper{

	protected $_defaultFormOptions = [
		'text'=>[
			'class'=>'form-control',
			'div'=>'form-group'
		],
		'button'=>[
			'class'=>'btn btn-default',
			'div'=>'form-group'
		]
	];

	public function initialize(array $config){
		parent::initialize($config);

		// se ../config/app_form.php
		$this->config('templates',[
	        // 'button' => '<button class="btn" {{attrs}}>{{text}}</button>',
	        'checkboxFormGroup' => '<div class="checkbox">{{label}}</div>',
	        'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
	        'file' => '<input class="form-control" type="file" name="{{name}}"{{attrs}}>',
	        'formStart' => '<form role="form"{{attrs}}>',
	        'formGroup' => '<div class="form-group">{{label}}{{input}}</div>',
	        'inputContainer' => '{{content}}',
	        'select' => '<select class="form-control" name="{{name}}"{{attrs}}>{{content}}</select>',
	        'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
	        'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
	        'radioWrapper' => '<div class="radio">{{label}}</div>',
	        'textarea' => '<textarea class="form-control" name="{{name}}"{{attrs}}>{{value}}</textarea>',
	        'submitContainer' => '<div class="form-group">{{content}}</div>',
		]);
	}

	public function input( $fieldName , array $options = [] ){
		if(isset($options['type']) && $options['type']=='button'){
			$options = array_merge_recursive($this->_defaultFormOptions['button'],$options);
			$options['class'] = 'btn btn-default '.$options['class'];
		}else{
			$options = array_merge_recursive($this->_defaultFormOptions['text'],$options);
		}
		if(isset($options['type']) && $options['type']=='date'){
			$options['type'] = 'text';
			$options['class'] .= ' datepicker';
		}
		return parent::input($fieldName,$options);
	}

	public function button( $title , array $options = [] ){
		$options = array_merge_recursive($this->_defaultFormOptions['button'],$options);
		return parent::button($title,$options);
	}

	public function __construct(View $View, array $config = []){
		$this->_defaultWidgets['datetime'] = ['\AdminTheme\View\Widget\DateTimeWidget', 'select'];
		parent::__construct($View, $config);
		// $this->addWidget('datetime',['\AdminTheme\View\Widget\DateTimeWidget', 'select']);
	}

}