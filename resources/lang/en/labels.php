<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'copyright' => 'Copyright',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'buy-and-resale-proposals' => [
            'create'    =>  'Create Buy and Resale Proposal',
            'deleted'   =>  'Deleted Buy and Resale Proposals',
            'edit'      =>  'Edit Buy and Resale Proposal',

            'management' => 'Buy and Resale Proposal Management',
            'list'       => 'Buy and Resale Proposal List',

            'table' =>  [
                'customer_id'                       => 'Customer',
                'user_id'                           => 'Issuer',
                'status'                            => 'Status',
                'collection_status'                 => 'Overall Status',
                'purchase_order'                    => 'Purchase Order',
                'rfq_number'                        => 'RFQ Number',
                'wpc_reference'                     => 'WPC Reference',
                'to'                                => 'To',
                'sold_to'                           => 'Sold To',
                'invoice_to'                        => 'Invoice To',
                'invoice_to_address'                => 'Invoice To Address',
                'ship_to'                           => 'Ship To',
                'ship_to_address'                   => 'Ship To Address',
                'wpcoc'                             => 'WPCOC',
                'order_entry_no'                    => 'Order Entry Number',
                'ship_via'                          => 'Ship Via',
                'amount'                            => 'Amount',
                'insurance'                         => 'Insurance',
                'bank_detail_name'                  => 'Bank Detail Name',
                'bank_detail_address'               => 'Bank Detail Address',
                'bank_detail_account_number'            => 'Bank Detail Account Number',
                'bank_detail_swift_code'            => 'Bank Detail Swift Code',
                'bank_detail_account_name'          => 'Bank Detail Account Name',
                'terms_of_payment_1'                => 'Terms of Payment (1)',
                'terms_of_payment_address'          => 'Terms of Payment Address',
                'documents'                         => 'Documents',
                'special_instruction'               => 'Special Instruction',
                'packing'                           => 'Packing',
                'commission_note'                   => 'Commission Note',
                'commission_address'                => 'Commission Address',
                'commission_account_number'         => 'Commission Account Number',
                'commission_swift_code'             => 'Commission Swift Code',
                'file_name'                         => 'File Name',
                'created_at'                        => 'Date Created',
                'updated_at'                        => 'Date Updated',
                'deleted_at'                        => 'Deleted At'
            ],

            'tabs'  =>  [
                'titles'    =>  [
                    'overview'  =>  'Overview'
                ],

                'content'   =>  [
                    'overview'  =>  [
                        'customer_id'                       => 'Customer',
                        'user_id'                           => 'Issuer',
                        'status'                            => 'Status',
                        'collection_status'                 => 'Overall Status',
                        'purchase_order'                    => 'Purchase Order',
                        'rfq_number'                        => 'RFQ Number',
                        'wpc_reference'                     => 'WPC Reference',
                        'to'                                => 'To',
                        'sold_to'                           => 'Sold To',
                        'invoice_to'                        => 'Invoice To',
                        'invoice_to_address'                => 'Invoice To Address',
                        'ship_to'                           => 'Ship To',
                        'ship_to_address'                   => 'Ship To Address',
                        'wpcoc'                             => 'WPCOC',
                        'order_entry_no'                    => 'Order Entry Number',
                        'ship_via'                          => 'Ship Via',
                        'amount'                            => 'Amount',
                        'insurance'                         => 'Insurance',
                        'bank_detail_name'                  => 'Bank Detail Name',
                        'bank_detail_address'               => 'Bank Detail Address',
                        'bank_detail_account_no'            => 'Bank Detail Account Number',
                        'bank_detail_swift_code'            => 'Bank Detail Swift Code',
                        'bank_detail_account_name'          => 'Bank Detail Account Name',
                        'terms_of_payment_1'                => 'Terms of Payment (1)',
                        'terms_of_payment_address'          => 'Terms of Payment Address',
                        'documents'                         => 'Documents',
                        'special_instruction'               => 'Special Instruction',
                        'packing'                           => 'Packing',
                        'commission_note'                   => 'Commission Note',
                        'commission_address'                => 'Commission Address',
                        'commission_account_number'         => 'Commission Account Number',
                        'commission_swift_code'             => 'Commission Swift Code',
                        'file_name'                         => 'File Name',
                        'created_at'                        => 'Date Created',
                        'updated_at'                        => 'Date Updated',
                        'deleted_at'                        => 'Deleted At'
                    ]
                ]
            ],

            'view' => ':indented_proposal'
        ],

        'indented_proposals' => [
            'create'    =>  'Create Indented Proposal',
            'deleted'   =>  'Deleted Indented Proposals',
            'edit'      =>  'Edit Indented Proposal',

            'management' => 'Indented Proposal Management',
            'list'       => 'Indented Proposal List',

            'table' =>  [
                'id'                                => 'ID',
                'order_entry_no'                    => 'Order Entry Number',
                'customer_id'                       => 'Customer',
                'user_id'                           => 'Issuer',
                'status'                            => 'Status',
                'collection_status'                 => 'Overall Status',
                'purchase_order'                    => 'Purchase Order',
                'rfq_number'                        => 'RFQ Number',
                'wpc_reference'                     => 'WPC Reference',
                'to'                                => 'To',
                'sold_to'                           => 'Sold To',
                'invoice_to'                        => 'Invoice To',
                'invoice_to_address'                => 'Invoice To Address',
                'ship_to'                           => 'Ship To',
                'ship_to_address'                   => 'Ship To Address',
                'wpcoc'                             => 'WPCOC',
                'order_entry_no'                    => 'Order Entry Number',
                'ship_via'                          => 'Ship Via',
                'amount'                            => 'Amount',
                'insurance'                         => 'Insurance',
                'bank_detail_name'                  => 'Bank Detail Name',
                'bank_detail_address'               => 'Bank Detail Address',
                'bank_detail_account_no'            => 'Bank Detail Account Number',
                'bank_detail_swift_code'            => 'Bank Detail Swift Code',
                'bank_detail_account_name'          => 'Bank Detail Account Name',
                'terms_of_payment_1'                => 'Terms of Payment (1)',
                'terms_of_payment_address'          => 'Terms of Payment Address',
                'documents'                         => 'Documents',
                'special_instruction'               => 'Special Instruction',
                'packing'                           => 'Packing',
                'commission_note'                   => 'Commission Note',
                'commission_address'                => 'Commission Address',
                'commission_account_number'         => 'Commission Account Number',
                'commission_swift_code'             => 'Commission Swift Code',
                'file_name'                         => 'File Name',
                'created_at'                        => 'Date Created',
                'updated_at'                        => 'Date Updated',
                'deleted_at'                        => 'Deleted At'
            ],

            'tabs'  =>  [
                'titles'    =>  [
                    'overview'  =>  'Overview'
                ],

                'content'   =>  [
                    'overview'  =>  [
                        'customer_id'                       => 'Customer',
                        'user_id'                           => 'Issuer',
                        'status'                            => 'Status',
                        'collection_status'                 => 'Overall Status',
                        'purchase_order'                    => 'Purchase Order',
                        'rfq_number'                        => 'RFQ Number',
                        'wpc_reference'                     => 'WPC Reference',
                        'to'                                => 'To',
                        'sold_to'                           => 'Sold To',
                        'invoice_to'                        => 'Invoice To',
                        'invoice_to_address'                => 'Invoice To Address',
                        'ship_to'                           => 'Ship To',
                        'ship_to_address'                   => 'Ship To Address',
                        'wpcoc'                             => 'WPCOC',
                        'order_entry_no'                    => 'Order Entry Number',
                        'ship_via'                          => 'Ship Via',
                        'amount'                            => 'Amount',
                        'insurance'                         => 'Insurance',
                        'bank_detail_name'                  => 'Bank Detail Name',
                        'bank_detail_address'               => 'Bank Detail Address',
                        'bank_detail_account_no'            => 'Bank Detail Account Number',
                        'bank_detail_swift_code'            => 'Bank Detail Swift Code',
                        'bank_detail_account_name'          => 'Bank Detail Account Name',
                        'terms_of_payment_1'                => 'Terms of Payment (1)',
                        'terms_of_payment_address'          => 'Terms of Payment Address',
                        'documents'                         => 'Documents',
                        'special_instruction'               => 'Special Instruction',
                        'packing'                           => 'Packing',
                        'commission_note'                   => 'Commission Note',
                        'commission_address'                => 'Commission Address',
                        'commission_account_number'         => 'Commission Account Number',
                        'commission_swift_code'             => 'Commission Swift Code',
                        'file_name'                         => 'File Name',
                        'created_at'                        => 'Date Created',
                        'updated_at'                        => 'Date Updated',
                        'deleted_at'                        => 'Deleted At'
                    ]
                ]
            ],

            'view' => ':indented_proposal'
        ],

        'customers' => [
            'create'    =>  'Create Customer',
            'deleted'   =>  'Deleted Customers',
            'edit'      =>  'Edit Customer',

            'management'    =>  'Customer Management',
            'list'          =>  'Customer List',

            'table'         =>  [
                'name'              =>  'Name',
                'postal_code'       =>  'Postal Code',
                'address'           =>  'address',
                'city'              =>  'City',
                'plant_site_address'=>  'Plant Site Address',
                'contact_number'    =>  'Contact Number',
                'contact_person'    =>  'Contact Person',
                'position'          =>  'Contact Person Position',
                'created_at'        =>  'Date Created',
                'updated_at'        =>  'Date Updated',
                'deleted_at'        =>  'Date Deleted',
                'total'             =>  'customer total|customers total'
            ],

            'tabs'  =>  [
                'titles'    =>  [
                    'overview'  =>  'Overview'
                ],

                'content'   =>  [
                    'overview'  =>  [
                        'name'              =>  'Name',
                        'postal_code'       =>  'Postal Code',
                        'address'           =>  'address',
                        'city'              =>  'City',
                        'plant_site_address'=>  'Plant Site Address',
                        'contact_number'    =>  'Contact Number',
                        'contact_person'    =>  'Contact Person',
                        'position_of_contact_person'          =>  'Contact Person Position',
                        'created_at'        =>  'Created at',
                        'updated_at'        =>  'Updated at',
                        'deleted_at'        =>  'Deleted at'
                    ]
                ]
            ],

            'view'  =>  ':customer'
        ],

        // Seal
        'seals' => [
            'create'              => 'Create Seal',
            'deleted'             => 'Deleted Seals',
            'edit'                => 'Edit Seal',

            'management'          => 'Seal Management',
            'list'                => 'Seal List',

            'table' => [
                'name'              =>  'Seal Name',
                'drawing_number'    =>  'Drawing Number',
                'bom_number'        =>  'BOM Number',
                'end_user'          =>  'End User',
                'seal_type'         =>  'Seal Type',
                'material_number'   =>  'Material Number',
                'code'              =>  'Code',
                'model'             =>  'Model',
                'serial_number'     =>  'Serial Number',
                'tag'               =>  'Tag',
                'price'             =>  'Price',
                'scanned_file'      =>  'Scanned File',
                'total'             =>  'seal total|seals total',

                'pricing_history'   => [
                    'po_number'     => 'P.O Number',
                    'pricing_date'  => 'Pricing Date',
                    'price'         => 'Price',
                    'delivery'      => 'Delivery',
                    'terms'         => 'Terms',
                    'fpd_reference' => 'FPD Reference',
                    'wpc_reference' => 'WPC Reference',
                    'created_at'    => 'Date Added'
                ]
            ],

            'tabs' => [
                'titles' => [
                    'overview' => 'Overview',
                    'history'  => 'History',
                ],

                'content' => [
                    'overview' => [
                        'name'              =>  'Seal Name',
                        'drawing_number'    =>  'Drawing Number',
                        'bom_number'        =>  'BOM Number',
                        'end_user'          =>  'End User',
                        'seal_type'         =>  'Seal Type',
                        'material_number'   =>  'Material Number',
                        'code'              =>  'Code',
                        'model'             =>  'Model',
                        'serial_number'     =>  'Serial Number',
                        'tag'               =>  'Tag',
                        'price'             =>  'Price',
                        'scanned_file'      =>  'Scanned File',
                        'created_at'        =>  'Date Created',
                        'updated_at'        =>  'Date Updated',
                        'deleted_at'        =>  'Date Deleted',

                        'pricing_history'   => [
                            'po_number'     => 'P.O Number',
                            'pricing_date'  => 'Pricing Date',
                            'price'         => 'Price',
                            'delivery'      => 'Delivery',
                            'terms'         => 'Terms',
                            'fpd_reference' => 'FPD Reference',
                            'wpc_reference' => 'WPC Reference',
                            'created_at'    => 'Date Added'
                        ]
                    ],
                ],
            ],

            'view' => ':seal',
        ],

        // Aftermarket
        'aftermarkets' => [
            'create'              => 'Create Aftermarket',
            'deleted'             => 'Deleted Aftermarkets',
            'edit'                => 'Edit Aftermarket',

            'management'          => 'Aftermarket Management',
            'list'                => 'Aftermarket List',

            'table' => [
                'name'              =>  'Aftermarket Name',
                'model'             =>  'Model',
                'part_number'       =>  'Part Number',
                'reference_number'  =>  'Reference Number',
                'material_number'   =>  'Material Number',
                'serial_number'     =>  'Serial Number',
                'tag_number'        =>  'Tag Number',
                'ccn_number'        =>  'CCN Number',
                'price'             =>  'Price',
                'company_name'      =>  'Company Name',
                'description'       =>  'Description',
                'stock_number'      =>  'Stock Number',
                'sap_number'        =>  'SAP Number',
                'scanned_file'      =>  'Scanned File',
                'created_at'        =>  'Date Created',
                'updated_at'        =>  'Date Updated',
                'deleted_at'        =>  'Date Deleted',
                'total'             =>  'aftermarket total|aftermarkets total',

                'pricing_history'   => [
                    'po_number'     => 'P.O Number',
                    'pricing_date'  => 'Pricing Date',
                    'price'         => 'Price',
                    'delivery'      => 'Delivery',
                    'terms'         => 'Terms',
                    'fpd_reference' => 'FPD Reference',
                    'wpc_reference' => 'WPC Reference',
                    'created_at'    => 'Date Added'
                ]
            ],

            'tabs' => [
                'titles' => [
                    'overview' => 'Overview',
                    'history'  => 'History',
                ],

                'content' => [
                    'overview' => [
                        'name'              =>  'Aftermarket Name',
                        'model'             =>  'Model',
                        'part_number'       =>  'Part Number',
                        'reference_number'  =>  'Reference Number',
                        'material_number'   =>  'Material Number',
                        'serial_number'     =>  'Serial Number',
                        'tag_number'        =>  'Tag Number',
                        'ccn_number'        =>  'CCN Number',
                        'price'             =>  'Price',
                        'company_name'      =>  'Company Name',
                        'description'       =>  'Description',
                        'stock_number'      =>  'Stock Number',
                        'sap_number'        =>  'SAP Number',
                        'scanned_file'      =>  'Scanned File',
                        'created_at'        =>  'Date Created',
                        'updated_at'        =>  'Date Updated',
                        'deleted_at'        =>  'Date Deleted',

                        'pricing_history'   => [
                            'po_number'     => 'P.O Number',
                            'pricing_date'  => 'Pricing Date',
                            'price'         => 'Price',
                            'delivery'      => 'Delivery',
                            'terms'         => 'Terms',
                            'fpd_reference' => 'FPD Reference',
                            'wpc_reference' => 'WPC Reference',
                            'created_at'    => 'Date Added'
                        ]
                    ],
                ],
            ],

            'view' => ':aftermarket',
        ],

        // Projects
        'projects' => [
            'create'              => 'Create Project',
            'deleted'             => 'Deleted Projects',
            'edit'                => 'Edit Project',

            'management'          => 'Project Management',
            'list'                => 'Project List',

            'table' => [
                'customer'          =>  'Project Customer',
                'name'              =>  'Project Name',
                'pump_model'        =>  'Pump Model',
                'tag_number'        =>  'Tag Number',
                'serial_number'     =>  'Serial Number',
                'scanned_file'      =>  'Scanned File',
                'final_result'      =>  'Final Result',
                'total'             =>  'project total|projects total',

                'pricing_history'   => [
                    'po_number'     => 'P.O Number',
                    'pricing_date'  => 'Pricing Date',
                    'price'         => 'Price',
                    'delivery'      => 'Delivery',
                    'terms'         => 'Terms',
                    'fpd_reference' => 'FPD Reference',
                    'wpc_reference' => 'WPC Reference',
                    'created_at'    => 'Date Added'
                ]
            ],

            'tabs' => [
                'titles' => [
                    'overview' => 'Overview',
                    'history'  => 'History',
                ],

                'content' => [
                    'overview' => [
                        'customer'          =>  'Project Customer',
                        'name'              =>  'Project Name',
                        'source'            =>  'Source',
                        'address_1'         =>  'Address',
                        'contact_person_1'  =>  'Contact Person',
                        'contact_number_1'  =>  'Contact Number',
                        'email_1'   =>  'Contact E-mail',
                        
                        'consultant'        =>  'Consultant',

                        'address_2'         =>  'Address',
                        'contact_person_2'  =>  'Contact Person',
                        'contact_number_2'  =>  'Contact Number',
                        'email_2'   =>  'Contact E-mail',

                        'status'            =>  'Status',

                        'shorted_list_epc'  =>  'Shorted List EPC',
                        'address_3'         =>  'Address',
                        'contact_person_3'  =>  'Contact Person',
                        'contact_number_3'  =>  'Contact Number',
                        'email_3'   =>  'Contact E-mail',

                        'approved_vendors_list' =>  'Approved Vendors List',
                        'requirements_coor'     =>  'Requirements/COOR',
                        'epc_award'             =>  'EPC Award',
                        'award_date'            =>  'Award Date',
                        'implementation_date'   =>  'Implementation Date',
                        'execution_date'        =>  'Execution Date',

                        'type_of_sales'        =>  'Type of Sales',

                        'bu'            =>  'BU',
                        'bu_reference'  =>  'BU Reference',
                        'wpc_reference' =>  'WPC Reference',
                        'affinity_reference' =>  'Affinity Reference',
                        'value'         =>  'Value',

                        'reference_number'  =>  'Reference Number',
                        'types_of_sales'    =>  'Types of Sales',
                        'tag_number'        =>  'Tag Number',
                        'application'       =>  'Application',
                        'pump_model'        =>  'Pump Model',
                        'serial_number'     =>  'Serial Number',
                        'competitors'       =>  'Competitors',
                        'scanned_file'      =>  'Scanned File',
                        'final_result'      =>  'Final Result',
                        'created_at'        =>  'Date Created',
                        'updated_at'        =>  'Date Updated',
                        'deleted_at'        =>  'Date Deleted',
                        'total'             =>  'project total|projects total',

                        'pricing_history'   => [
                            'po_number'     => 'P.O Number',
                            'pricing_date'  => 'Pricing Date',
                            'price'         => 'Price',
                            'delivery'      => 'Delivery',
                            'terms'         => 'Terms',
                            'fpd_reference' => 'FPD Reference',
                            'wpc_reference' => 'WPC Reference',
                            'created_at'    => 'Date Added'
                        ]
                    ],
                ],
            ],

            'view' => 'View Project',
        ],

        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'first_name'     => 'First Name',
                    'last_name'      => 'Last Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'other_permissions' => 'Other Permissions',
                    'permissions' => 'Permissions',
                    'roles'          => 'Roles',
                    'social' => 'Social',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'first_name'   => 'First Name',
                            'last_name'    => 'Last Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'expired_password_box_title' => 'Your password has expired.',
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'update_password_button'           => 'Update Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'first_name'         => 'First Name',
                'last_name'          => 'Last Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],
];
