<?php

namespace App\Providers;

use App\Models\Auth\User;
use App\Models\Project\Project;
use App\Models\Project\ProjectPricingHistory;
use App\Models\Aftermarket\Aftermarket;
use App\Models\Aftermarket\AftermarketPricingHistory;
use App\Models\Seal\Seal;
use App\Models\Seal\SealPricingHistory;
use App\Models\IndentedProposal\IndentedProposal;
use App\Models\BuyAndResaleProposal\BuyAndResaleProposal;
use App\Models\Customer\Customer;

use Illuminate\Support\Facades\Route;
use Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider.
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $project     = str_contains(Request::url(), ['project']);
        $seal        = str_contains(Request::url(), ['seal']);
        $aftermarket = str_contains(Request::url(), ['aftermarket']);
        /*
        * Register route model bindings
        */

        /*
         * This allows us to use the Route Model Binding with SoftDeletes on
         * On a model by model basis
         */
        $this->bind('deletedUser', function ($value) {
            $user = new User;

            return User::withTrashed()->where($user->getRouteKeyName(), $value)->first();
        });

        // Project
        $this->bind('deletedProject', function ($value) {
            $project = new Project;

            return Project::withTrashed()->where($project->getRouteKeyName(), $value)->first();
        });

        $this->bind('project', function ($value) {
            $project = new Project;

            return Project::withTrashed()->where($project->getRouteKeyName(), $value)->first();
        });

        $this->bind('project', function ($value) {
            $project = new Project;

            return Project::where($project->getRouteKeyName(), $value)->first();
        });

        if ($project) {
            $this->bind('pricing_history', function ($value) {
                $pricing_history = new ProjectPricingHistory;

                return ProjectPricingHistory::where($pricing_history->getRouteKeyName(), $value)->first();
            });
        } elseif ($seal) {
            $this->bind('pricing_history', function ($value) {
                $pricing_history = new SealPricingHistory;

                return SealPricingHistory::where($pricing_history->getRouteKeyName(), $value)->first();
            });
        } elseif ($aftermarket) {
            $this->bind('pricing_history', function ($value) {
                $pricing_history = new AftermarketPricingHistory;

                return AftermarketPricingHistory::where($pricing_history->getRouteKeyName(), $value)->first();
            });
        }

        $this->bind('deletedProjectPricingHistory', function ($value) {
            $pricing_history = new ProjectPricingHistory;

            return ProjectPricingHistory::withTrashed()->where($pricing_history->getRouteKeyName(), $value)->first();
        });

        // Aftermarket
        $this->bind('deletedAftermarket', function ($value) {
            $aftermarket = new Aftermarket;

            return Aftermarket::withTrashed()->where($aftermarket->getRouteKeyName(), $value)->first();
        });

        $this->bind('aftermarket', function ($value) {
            $aftermarket = new Aftermarket;

            return Aftermarket::withTrashed()->where($aftermarket->getRouteKeyName(), $value)->first();
        });

        $this->bind('aftermarket', function ($value) {
            $aftermarket = new Aftermarket;

            return Aftermarket::where($aftermarket->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedAftermarketPricingHistory', function ($value) {
            $pricing_history = new AftermarketPricingHistory;

            return AftermarketPricingHistory::withTrashed()->where($pricing_history->getRouteKeyName(), $value)->first();
        });

        // Seal
        $this->bind('deletedSeal', function ($value) {
            $seal = new Seal;

            return Seal::withTrashed()->where($seal->getRouteKeyName(), $value)->first();
        });

        $this->bind('seal', function ($value) {
            $seal = new Seal;

            return Seal::withTrashed()->where($seal->getRouteKeyName(), $value)->first();
        });

        $this->bind('seal', function ($value) {
            $seal = new Seal;

            return Seal::where($seal->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedSealPricingHistory', function ($value) {
            $pricing_history = new SealPricingHistory;

            return SealPricingHistory::withTrashed()->where($pricing_history->getRouteKeyName(), $value)->first();
        });

        // Customer
        $this->bind('deletedCustomer', function ($value) {
            $customer = new Customer;

            return Customer::withTrashed()->where($customer->getRouteKeyName(), $value)->first();
        });

        $this->bind('customer', function ($value) {
            $customer = new Customer;

            return Customer::withTrashed()->where($customer->getRouteKeyName(), $value)->first();
        });

        // Seal
        $this->bind('deletedSeal', function ($value) {
            $seal = new Seal;

            return Seal::withTrashed()->where($seal->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedIndentedProposal', function ($value) {
            $indented_proposal = new IndentedProposal;

            return IndentedProposal::withTrashed()->where($indented_proposal->getRouteKeyName(), $value)->first();
        });

        $this->bind('deletedBuyAndResaleProposal', function ($value) {
            $buy_and_resale_proposal = new BuyAndResaleProposal;

            return BuyAndResaleProposal::withTrashed()->where($buy_and_resale_proposal->getRouteKeyName(), $value)->first();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
