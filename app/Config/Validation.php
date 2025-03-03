<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $skl_rules = [
        'name' => [
            'label' => 'Nama Santri',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'min_length' => '{field} minimal 3 karakter.'
            ]
        ],
        'name_orang_tua' => [
            'label' => 'Nama Orang Tua',
            'rules' => 'required|min_length[3]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'min_length' => '{field} minimal 3 karakter.'
            ]
        ],
        'kelas' => [
            'label' => 'Kelas',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.'
            ]
        ],
        'tahun_ajaran' => [
            'label' => 'Tahun Ajaran',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.'
            ]
        ],
    ];
}
