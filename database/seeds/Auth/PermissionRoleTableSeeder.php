<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        $admin          = Role::create(['name' => config('access.users.admin_role')]);
        $executive      = Role::create(['name' => 'executive']);
        $user           = Role::create(['name' => config('access.users.default_role')]);
        $sales_agent    = Role::create(['name' => 'sales agent']);
        $secretary      = Role::create(['name' => 'secretary']);
        $collection     = Role::create(['name' => 'collection']);

        // Create Permissions
        Permission::create(['name' => 'view backend']);
        // Assign Customer
        Permission::create(['name' => 'assign customer']);
        // Project Permissions
        Permission::create(['name' => 'view project']);
        Permission::create(['name' => 'create project']);
        Permission::create(['name' => 'edit project']);
        Permission::create(['name' => 'store project']);
        Permission::create(['name' => 'update project']);
        Permission::create(['name' => 'restore project']);
        Permission::create(['name' => 'delete project']);
        Permission::create(['name' => 'force delete project']);
        Permission::create(['name' => 'upload project']);
        // Aftermarket Permissions
        Permission::create(['name' => 'view aftermarket']);
        Permission::create(['name' => 'create aftermarket']);
        Permission::create(['name' => 'edit aftermarket']);
        Permission::create(['name' => 'store aftermarket']);
        Permission::create(['name' => 'update aftermarket']);
        Permission::create(['name' => 'restore aftermarket']);
        Permission::create(['name' => 'delete aftermarket']);
        Permission::create(['name' => 'force delete aftermarket']);
        Permission::create(['name' => 'upload aftermarket']);
        // Seals Permissions
        Permission::create(['name' => 'view seal']);
        Permission::create(['name' => 'create seal']);
        Permission::create(['name' => 'edit seal']);
        Permission::create(['name' => 'store seal']);
        Permission::create(['name' => 'update seal']);
        Permission::create(['name' => 'restore seal']);
        Permission::create(['name' => 'delete seal']);
        Permission::create(['name' => 'force delete seal']);
        Permission::create(['name' => 'upload seal']);
        // Indented Proposal Permissions
        Permission::create(['name' => 'view indented proposal']);
        Permission::create(['name' => 'create indented proposal']);
        Permission::create(['name' => 'edit indented proposal']);
        Permission::create(['name' => 'collect indented proposal']);
        Permission::create(['name' => 'store indented proposal']);
        Permission::create(['name' => 'accept indented proposal']);
        Permission::create(['name' => 'update indented proposal']);
        Permission::create(['name' => 'restore indented proposal']);
        Permission::create(['name' => 'delete indented proposal']);
        Permission::create(['name' => 'force delete indented proposal']);
        Permission::create(['name' => 'upload indented proposal']);
        // Buy and Resale Proposal Permissions
        Permission::create(['name' => 'view buy and resale proposal']);
        Permission::create(['name' => 'create buy and resale proposal']);
        Permission::create(['name' => 'edit buy and resale proposal']);
        Permission::create(['name' => 'collect buy and resale proposal']);
        Permission::create(['name' => 'store buy and resale proposal']);
        Permission::create(['name' => 'accept buy and resale proposal']);
        Permission::create(['name' => 'update buy and resale proposal']);
        Permission::create(['name' => 'restore buy and resale proposal']);
        Permission::create(['name' => 'delete buy and resale proposal']);
        Permission::create(['name' => 'force delete buy and resale proposal']);
        Permission::create(['name' => 'upload buy and resale proposal']);
        // Customer Permissions
        Permission::create(['name' => 'view customer']);
        Permission::create(['name' => 'create customer']);
        Permission::create(['name' => 'edit customer']);
        Permission::create(['name' => 'store customer']);
        Permission::create(['name' => 'update customer']);
        Permission::create(['name' => 'restore customer']);
        Permission::create(['name' => 'delete customer']);
        Permission::create(['name' => 'force delete customer']);
        // Sales Agent Permissions
        Permission::create(['name' => 'view sales agent']);
        Permission::create(['name' => 'create sales agent']);
        Permission::create(['name' => 'edit sales agent']);
        Permission::create(['name' => 'store sales agent']);
        Permission::create(['name' => 'update sales agent']);
        Permission::create(['name' => 'restore sales agent']);
        Permission::create(['name' => 'delete sales agent']);
        Permission::create(['name' => 'force delete sales agent']);
        // Collect Permissions
        Permission::create(['name' => 'view collection']);
        Permission::create(['name' => 'create collection']);
        Permission::create(['name' => 'edit collection']);
        Permission::create(['name' => 'store collection']);
        Permission::create(['name' => 'update collection']);
        Permission::create(['name' => 'restore collection']);
        Permission::create(['name' => 'delete collection']);
        Permission::create(['name' => 'force delete collection']);
        // General (Seal, Aftermarket, Project) Create Pricing History
        Permission::create(['name' => 'create pricing history']);
        Permission::create(['name' => 'store pricing history']);
        Permission::create(['name' => 'edit pricing history']);
        Permission::create(['name' => 'update pricing history']);
        Permission::create(['name' => 'delete pricing history']);
        Permission::create(['name' => 'force delete pricing history']);
        Permission::create(['name' => 'restore pricing history']);

        // ALWAYS GIVE ADMIN ROLE ALL PERMISSIONS
        $admin->givePermissionTo('view backend');
        // Give admin accsss to assign customer
        $admin->givePermissionTo('assign customer');
        // Give admin full access of Project Module
        $admin->givePermissionTo('view project');
        $admin->givePermissionTo('create project');
        $admin->givePermissionTo('edit project');
        $admin->givePermissionTo('store project');
        $admin->givePermissionTo('update project');
        $admin->givePermissionTo('delete project');
        $admin->givePermissionTo('restore project');
        $admin->givePermissionTo('force delete project');
        $admin->givePermissionTo('upload project');
        // Give admin full access of Aftermarket Module
        $admin->givePermissionTo('view aftermarket');
        $admin->givePermissionTo('create aftermarket');
        $admin->givePermissionTo('edit aftermarket');
        $admin->givePermissionTo('store aftermarket');
        $admin->givePermissionTo('update aftermarket');
        $admin->givePermissionTo('delete aftermarket');
        $admin->givePermissionTo('restore aftermarket');
        $admin->givePermissionTo('force delete aftermarket');
        $admin->givePermissionTo('upload aftermarket');
        // Give admin full access of Seal Module
        $admin->givePermissionTo('view seal');
        $admin->givePermissionTo('create seal');
        $admin->givePermissionTo('edit seal');
        $admin->givePermissionTo('store seal');
        $admin->givePermissionTo('update seal');
        $admin->givePermissionTo('restore seal');
        $admin->givePermissionTo('delete seal');
        $admin->givePermissionTo('force delete seal');
        $admin->givePermissionTo('upload seal');
        // Give admin full access of Indented Proposal Module
        $admin->givePermissionTo('view indented proposal');
        $admin->givePermissionTo('create indented proposal');
        $admin->givePermissionTo('edit indented proposal');
        $admin->givePermissionTo('store indented proposal');
        $admin->givePermissionTo('accept indented proposal');
        $admin->givePermissionTo('update indented proposal');
        $admin->givePermissionTo('restore indented proposal');
        $admin->givePermissionTo('delete indented proposal');
        $admin->givePermissionTo('force delete indented proposal');
        $admin->givePermissionTo('upload indented proposal');
        // Give admin full access of Buy and Resale Module
        $admin->givePermissionTo('view buy and resale proposal');
        $admin->givePermissionTo('create buy and resale proposal');
        $admin->givePermissionTo('edit buy and resale proposal');
        $admin->givePermissionTo('store buy and resale proposal');
        $admin->givePermissionTo('accept buy and resale proposal');
        $admin->givePermissionTo('update buy and resale proposal');
        $admin->givePermissionTo('restore buy and resale proposal');
        $admin->givePermissionTo('delete buy and resale proposal');
        $admin->givePermissionTo('force delete buy and resale proposal');
        $admin->givePermissionTo('upload buy and resale proposal');
        // Give admin full access of Customer Module
        $admin->givePermissionTo('view customer');
        $admin->givePermissionTo('create customer');
        $admin->givePermissionTo('edit customer');
        $admin->givePermissionTo('store customer');
        $admin->givePermissionTo('update customer');
        $admin->givePermissionTo('restore customer');
        $admin->givePermissionTo('delete customer');
        $admin->givePermissionTo('force delete customer');
        // Give admin full access of Sales Agent Role
        $admin->givePermissionTo('view sales agent');
        $admin->givePermissionTo('create sales agent');
        $admin->givePermissionTo('edit sales agent');
        $admin->givePermissionTo('store sales agent');
        $admin->givePermissionTo('update sales agent');
        $admin->givePermissionTo('restore sales agent');
        $admin->givePermissionTo('delete sales agent');
        $admin->givePermissionTo('force delete sales agent');
        // Give admin a general (Seal, Aftermarket, Project) access to Pricing History
        $admin->givePermissionTo('create pricing history');
        $admin->givePermissionTo('store pricing history');
        $admin->givePermissionTo('edit pricing history');
        $admin->givePermissionTo('update pricing history');
        $admin->givePermissionTo('delete pricing history');
        $admin->givePermissionTo('force delete pricing history');
        $admin->givePermissionTo('restore pricing history');

        // Assign Permissions to other Roles
        $sales_agent->givePermissionTo('view backend');
        // Give admin full access of Project Module
        $sales_agent->givePermissionTo('view project');
        $sales_agent->givePermissionTo('create project');
        $sales_agent->givePermissionTo('edit project');
        $sales_agent->givePermissionTo('store project');
        $sales_agent->givePermissionTo('update project');
        $sales_agent->givePermissionTo('restore project');
        $sales_agent->givePermissionTo('force delete project');
        $sales_agent->givePermissionTo('upload project');
        // Give sales_agent full access of Aftermarket Module
        $sales_agent->givePermissionTo('view aftermarket');
        $sales_agent->givePermissionTo('create aftermarket');
        $sales_agent->givePermissionTo('edit aftermarket');
        $sales_agent->givePermissionTo('store aftermarket');
        $sales_agent->givePermissionTo('update aftermarket');
        $sales_agent->givePermissionTo('restore aftermarket');
        $sales_agent->givePermissionTo('force delete aftermarket');
        $sales_agent->givePermissionTo('upload aftermarket');
        // Give sales_agent full access of Seal Module
        $sales_agent->givePermissionTo('view seal');
        $sales_agent->givePermissionTo('create seal');
        $sales_agent->givePermissionTo('edit seal');
        $sales_agent->givePermissionTo('store seal');
        $sales_agent->givePermissionTo('update seal');
        $sales_agent->givePermissionTo('restore seal');
        $sales_agent->givePermissionTo('force delete seal');
        $sales_agent->givePermissionTo('upload seal');
        // Give sales_agent full access of Indented Proposal Module
        $sales_agent->givePermissionTo('view indented proposal');
        $sales_agent->givePermissionTo('create indented proposal');
        $sales_agent->givePermissionTo('edit indented proposal');
        $sales_agent->givePermissionTo('store indented proposal');
        $sales_agent->givePermissionTo('accept indented proposal');
        $sales_agent->givePermissionTo('update indented proposal');
        $sales_agent->givePermissionTo('restore indented proposal');
        $sales_agent->givePermissionTo('force delete indented proposal');
        $sales_agent->givePermissionTo('upload indented proposal');
        // Give sales_agent full access of Buy and Resale Module
        $sales_agent->givePermissionTo('view buy and resale proposal');
        $sales_agent->givePermissionTo('create buy and resale proposal');
        $sales_agent->givePermissionTo('edit buy and resale proposal');
        $sales_agent->givePermissionTo('store buy and resale proposal');
        $sales_agent->givePermissionTo('accept buy and resale proposal');
        $sales_agent->givePermissionTo('update buy and resale proposal');
        $sales_agent->givePermissionTo('restore buy and resale proposal');
        $sales_agent->givePermissionTo('force delete buy and resale proposal');
        $sales_agent->givePermissionTo('upload buy and resale proposal');
        // Give sales_agent full access of Customer Module
        $sales_agent->givePermissionTo('view customer');
        $sales_agent->givePermissionTo('create customer');
        $sales_agent->givePermissionTo('edit customer');
        $sales_agent->givePermissionTo('store customer');
        $sales_agent->givePermissionTo('update customer');
        $sales_agent->givePermissionTo('restore customer');
        $sales_agent->givePermissionTo('force delete customer');
        // Give admin a general (Seal, Aftermarket, Project) access to Pricing History
        $sales_agent->givePermissionTo('create pricing history');
        $sales_agent->givePermissionTo('store pricing history');
        $sales_agent->givePermissionTo('edit pricing history');
        $sales_agent->givePermissionTo('update pricing history');
        $sales_agent->givePermissionTo('delete pricing history');
        $sales_agent->givePermissionTo('force delete pricing history');
        $sales_agent->givePermissionTo('restore pricing history');

        // Assign Permissions to other Roles
        $secretary->givePermissionTo('view backend');
        // Give secretary full access of Indented Proposal Module
        $secretary->givePermissionTo('view indented proposal');
        $secretary->givePermissionTo('store indented proposal');
        $secretary->givePermissionTo('accept indented proposal');
        $secretary->givePermissionTo('update indented proposal');
        $secretary->givePermissionTo('restore indented proposal');
        $secretary->givePermissionTo('force delete indented proposal');
        $secretary->givePermissionTo('upload indented proposal');
        // Give secretary full access of Buy and Resale Module
        $secretary->givePermissionTo('view buy and resale proposal');
        $secretary->givePermissionTo('store buy and resale proposal');
        $secretary->givePermissionTo('accept buy and resale proposal');
        $secretary->givePermissionTo('update buy and resale proposal');
        $secretary->givePermissionTo('restore buy and resale proposal');
        $secretary->givePermissionTo('force delete buy and resale proposal');
        $secretary->givePermissionTo('upload buy and resale proposal');

        // Assign Permissions to other Roles
        $collection->givePermissionTo('view backend');
        // Give collection full access of Indented Proposal Module
        $collection->givePermissionTo('view indented proposal');
        $collection->givePermissionTo('collect indented proposal');
        $collection->givePermissionTo('accept indented proposal');
        $collection->givePermissionTo('update indented proposal');
        $collection->givePermissionTo('restore indented proposal');
        $collection->givePermissionTo('force delete indented proposal');
        // Give collection full access of Buy and Resale Module
        $collection->givePermissionTo('view buy and resale proposal');
        $collection->givePermissionTo('collect buy and resale proposal');
        $collection->givePermissionTo('accept buy and resale proposal');
        $collection->givePermissionTo('update buy and resale proposal');
        $collection->givePermissionTo('restore buy and resale proposal');
        $collection->givePermissionTo('force delete buy and resale proposal');

        $this->enableForeignKeys();
    }
}
