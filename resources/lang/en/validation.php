<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [

        'backend' => [
            'buy-and-resale-proposal' => [
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
                'file_name'                         => 'File Name'
            ],

            'indented-proposals' => [
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
                'file_name'                         => 'File Name'
            ],

            'pricing_history' =>  [
                'po_number'     =>  'PO Number',
                'pricing_date'  =>  'Pricing Date',
                'price'         =>  'Price',
                'terms'         =>  'Terms',
                'delivery'      =>  'Delivery',
                'fpd_reference' =>  'FPD Reference',
                'wpc_reference' =>  'WPC Reference'
            ],

            'seals' =>  [
                'name'              =>  'Seal Name',
                'drawing_number'    =>  'Drawing Number',
                'bom_number'        =>  'BOM Number',
                'end_user'          =>  'End User',
                'seal_type'         =>  'Seal Type',
                'material_number'   =>  'Material Number',
                'size'              =>  'Size',
                'code'              =>  'Code',
                'model'             =>  'Model',
                'serial_number'     =>  'Serial Number',
                'tag'               =>  'Tag',
                'price'             =>  'Price',
                'scanned_file'      =>  'Scanned File'
            ],

            'aftermarkets'  =>  [
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
            ],

            'customers' =>  [
                'name'                          =>  'Customer\'s Name',
                'city'                          =>  'City',
                'address'                       =>  'Address',
                'postal_code'                   =>  'Postal Code',
                'plant_site_address'            =>  'Plant Site Address',
                'contact_person'                =>  'Contact Person',
                'contact_number'                =>  'Contact number',
                'position_of_contact_person'    => 'Position of Contacted Person'
            ],

            'projects'  =>  [
                'customer'          =>  'Customer Name',
                'name'              =>  'Project Name',
                'source'            =>  'Source',
                'address_1'         =>  'Address',
                'contact_person_1'  =>  'Contact Person',
                'contact_number_1'  =>  'Contact Number',
                'email_1'           =>  'E-mail (1)',
                
                'consultant'        =>  'Consultant',

                'address_2'         =>  'Address',
                'contact_person_2'  =>  'Contact Person',
                'contact_number_2'  =>  'Contact Number',
                'email_2'           =>  'E-mail (2)',

                'status'            =>  'Status',

                'shorted_list_epc'  =>  'Shorted List EPC',
                'address_3'         =>  'Address',
                'contact_person_3'  =>  'Contact Person',
                'contact_number_3'  =>  'Contact Number',
                'email_3'           =>  'E-mail (3)',

                'approved_vendors_list' =>  'Approved Vendors List',
                'requirements_coor'     =>  'Requirements/COOR',
                'epc_award'             =>  'EPC Award',
                'award_date'            =>  'Award Date',
                'implementation_date'   =>  'Implementation Date',
                'execution_date'        =>  'Execution Date',

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
            ],

            'access' => [
                'permissions' => [
                    'associated_roles' => 'Associated Roles',
                    'dependencies'     => 'Dependencies',
                    'display_name'     => 'Display Name',
                    'group'            => 'Group',
                    'group_sort'       => 'Group Sort',

                    'groups' => [
                        'name' => 'Group Name',
                    ],

                    'name'       => 'Name',
                    'first_name' => 'First Name',
                    'last_name'  => 'Last Name',
                    'system'     => 'System',
                ],

                'roles' => [
                    'associated_permissions' => 'Associated Permissions',
                    'name'                   => 'Name',
                    'sort'                   => 'Sort',
                ],

                'users' => [
                    'active'                  => 'Active',
                    'associated_roles'        => 'Associated Roles',
                    'confirmed'               => 'Confirmed',
                    'email'                   => 'E-mail Address',
                    'name'                    => 'Name',
                    'last_name'               => 'Last Name',
                    'first_name'              => 'First Name',
                    'other_permissions'       => 'Other Permissions',
                    'password'                => 'Password',
                    'password_confirmation'   => 'Password Confirmation',
                    'send_confirmation_email' => 'Send Confirmation E-mail',
                    'timezone'                => 'Timezone',
                    'language'                => 'Language',
                ],
            ],
        ],

        'frontend' => [
            'avatar'                    => 'Avatar Location',
            'email'                     => 'E-mail Address',
            'first_name'                => 'First Name',
            'last_name'                 => 'Last Name',
            'name'                      => 'Full Name',
            'password'                  => 'Password',
            'password_confirmation'     => 'Password Confirmation',
            'phone'                     => 'Phone',
            'message'                   => 'Message',
            'new_password'              => 'New Password',
            'new_password_confirmation' => 'New Password Confirmation',
            'old_password'              => 'Old Password',
            'timezone'                  => 'Timezone',
            'language'                  => 'Language',
        ],
    ],
];
