<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeGadget extends Resources
{
    protected $rules = array(
        'name' => 'required|string'
    );
    
    protected $table = 'type_gadget';

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
        "merek_id" => [
            'name' => 'merek_id',
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
            'placeholder' => 'Merek Name',
            // Options reference
            'reference' => "MerekGadget", // Select2 API endpoint => /api/v1/countries
            'relationship' => 'merek_gadget', // relationship request datatable
            'option' => [
                'value' => 'id',
                'label' => 'nama_merek'
            ]
        ],
        "nama_gadget" => [
            'name' => 'nama_gadget',
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
                'field' => 'merek_id'
            ],
            [
                'class' => 'col-6',
                'field' => 'nama_gadget'
            ]
        ],
    );

    public function merek_gadget() {
        return $this->belongsTo('App\Models\MerekGadget', 'merek_id', 'id')->withTrashed();
    }

    protected $searchable = array('name');
}
