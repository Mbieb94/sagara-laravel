<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerekGadget extends Resources
{
    protected $rules = array(
        'name' => 'required|string'
    );
    
    protected $table = 'merek_gadget';

    protected $structures = array(
        "id" => [
            'name' => 'id',
            'default' => null,
            'label' => 'ID',
            'display' => false,
            'validation' => [
                'create' => null,
                'update' => null,
                'delete' => null,
            ],
            'primary' => true,
            'required' => true,
            'type' => 'integer',
            'validated' => false,
            'nullable' => false,
            'note' => null
        ],
        "jenis_gadget_id" => [
            'name' => 'jenis_gadget_id',
            'default' => null,
            'label' => 'Jenis Gadget',
            'display' => true,
            'validation' => [
                'create' => 'required',
                'update' => 'required',
                'delete' => null,
            ],
            'primary' => false,
            'required' => true,
            'type' => 'reference',
            'validated' => true,
            'nullable' => false,
            'note' => null,
            'placeholder' => 'Jenis Gadget',
            // Options reference
            'reference' => "JenisGadget", // Select2 API endpoint => /api/v1/countries
            'relationship' => 'jenis_gadget', // relationship request datatable
            'option' => [
                'value' => 'code',
                'label' => 'jenis_gadget'
            ]
        ],
        "nama_merek" => [
            'name' => 'nama_merek',
            'default' => null,
            'label' => 'Name',
            'display' => true,
            'validation' => [
                'create' => 'required|string',
                'update' => 'required|string',
                'delete' => null,
            ],
            'primary' => false,
            'required' => true,
            'type' => 'text',
            'validated' => true,
            'nullable' => false,
            'note' => null,
            'placeholder' => 'Placeholder...',
        ],
        "created_at" => [
            'name' => 'created_at',
            'default' => null,
            'label' => 'Created At',
            'display' => false,
            'validation' => [
                'create' => null,
                'update' => null,
                'delete' => null,
            ],
            'primary' => false,
            'required' => false,
            'type' => 'datetime',
            'validated' => false,
            'nullable' => false,
            'note' => null
        ],
        "updated_at" => [
            'name' => 'updated_at',
            'default' => null,
            'label' => 'Updated At',
            'display' => false,
            'validation' => [
                'create' => null,
                'update' => null,
                'delete' => null,
            ],
            'primary' => false,
            'required' => false,
            'type' => 'datetime',
            'validated' => false,
            'nullable' => false,
            'note' => null
        ],
        "deleted_at" => [
            'name' => 'deleted_at',
            'default' => null,
            'label' => 'Deleted At',
            'display' => false,
            'validation' => [
                'create' => null,
                'update' => null,
                'delete' => null,
            ],
            'primary' => false,
            'required' => false,
            'type' => 'datetime',
            'validated' => false,
            'nullable' => false,
            'note' => null
        ]
    );

    protected $forms = array(
        [
            [
                'class' => 'col-6',
                'field' => 'jenis_gadget_id'
            ],
            [
                'class' => 'col-6',
                'field' => 'nama_merek'
            ]
        ],
    );

    public function jenis_gadget() {
        return $this->belongsTo('App\Models\JenisGadget', 'jenis_gadget_id', 'id')->withTrashed();
    }

    protected $searchable = array('name');
}
