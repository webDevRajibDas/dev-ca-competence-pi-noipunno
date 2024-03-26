<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('sso-auth', \App\Container\Auth::class);

        //services
        $this->app->bind(
            'App\Services\ClassService\ClassService',
            'App\Services\ClassService\EloquentClassService',
        );

        $this->app->bind(
            'App\Services\SubjectService\SubjectService',
            'App\Services\SubjectService\EloquentSubjectService',
        );
        $this->app->bind(
            'App\Services\ChapterService\ChapterService',
            'App\Services\ChapterService\EloquentChapterService',
        );

        $this->app->bind(
            'App\Services\WeightService\WeightService',
            'App\Services\WeightService\EloquentWeightService',
        );

        $this->app->bind(
            'App\Services\CompetenceService\CompetenceService',
            'App\Services\CompetenceService\EloquentCompetenceService',
        );

        $this->app->bind(
            'App\Services\PiService\PiService',
            'App\Services\PiService\EloquentPiService',
        );

        $this->app->bind(
            'App\Services\BiService\BiService',
            'App\Services\BiService\EloquentBiService',
        );

        $this->app->bind(
            'App\Services\AssessmentService\AssessmentService',
            'App\Services\AssessmentService\EloquentAssessmentService',
        );

        $this->app->bind(
            'App\Services\PiWeightService\PiWeightService',
            'App\Services\PiWeightService\EloquentPiWeightService',
        );

        $this->app->bind(
            'App\Services\BiWeightService\BiWeightService',
            'App\Services\BiWeightService\EloquentBiWeightService',
        );

        $this->app->bind(
            'App\Services\PiWeightGuideService\PiWeightGuideService',
            'App\Services\PiWeightGuideService\EloquentPiWeightGuideService',
        );

        $this->app->bind(
            'App\Services\OviggotaService\OviggotaService',
            'App\Services\OviggotaService\EloquentOviggotaService',
        );

        $this->app->bind(
            'App\Services\DimensionService\DimensionService',
            'App\Services\DimensionService\EloquentDimensionService',
        );

        $this->app->bind(
            'App\Services\PiSelectionService\PiSelectionService',
            'App\Services\PiSelectionService\EloquentPiSelectionService',
        );

        $this->app->bind(
            'App\Services\PiSelectionForAssessmentService\PiSelectionForAssessmentService',
            'App\Services\PiSelectionForAssessmentService\EloquentPiSelectionForAssessmentService',
        );

        $this->app->bind(
            'App\Services\BiDimensionService\BiDimensionService',
            'App\Services\BiDimensionService\EloquentBiDimensionService',
        );

        //repositories
        $this->app->bind(
            'App\Repositories\ClassRepository\ClassRepository',
            'App\Repositories\ClassRepository\EloquentClassRepository',
        );

        $this->app->bind(
            'App\Repositories\SubjectRepository\SubjectRepository',
            'App\Repositories\SubjectRepository\EloquentSubjectRepository'
        );

        $this->app->bind(
            'App\Repositories\ChapterRepository\ChapterRepository',
            'App\Repositories\ChapterRepository\EloquentChapterRepository'
        );

        $this->app->bind(
            'App\Repositories\WeightRepository\WeightRepository',
            'App\Repositories\WeightRepository\EloquentWeightRepository'
        );

        $this->app->bind(
            'App\Repositories\CompetenceRepository\CompetenceRepository',
            'App\Repositories\CompetenceRepository\EloquentCompetenceRepository'
        );

        $this->app->bind(
            'App\Repositories\PiRepository\PiRepository',
            'App\Repositories\PiRepository\EloquentPiRepository'
        );

        $this->app->bind(
            'App\Repositories\BiRepository\BiRepository',
            'App\Repositories\BiRepository\EloquentBiRepository'
        );

        $this->app->bind(
            'App\Repositories\PiWeightRepository\PiWeightRepository',
            'App\Repositories\PiWeightRepository\EloquentPiWeightRepository'
        );

        $this->app->bind(
            'App\Repositories\BiWeightRepository\BiWeightRepository',
            'App\Repositories\BiWeightRepository\EloquentBiWeightRepository'
        );

        $this->app->bind(
            'App\Repositories\PiWeightGuideRepository\PiWeightGuideRepository',
            'App\Repositories\PiWeightGuideRepository\EloquentPiWeightGuideRepository'
          );

        $this->app->bind(
            'App\Repositories\AssessmentRepository\AssessmentRepository',
            'App\Repositories\AssessmentRepository\EloquentAssessmentRepository'
        );

        $this->app->bind(
            'App\Repositories\PiSelectionForAssessmentRepository\PiSelectionForAssessmentRepository',
            'App\Repositories\PiSelectionForAssessmentRepository\EloquentPiSelectionForAssessmentRepository'
        );

        $this->app->bind(
            'App\Repositories\OviggotaRepository\OviggotaRepository',
            'App\Repositories\OviggotaRepository\EloquentOviggotaRepository'
        );

        $this->app->bind(
            'App\Repositories\DimensionRepository\DimensionRepository',
            'App\Repositories\DimensionRepository\EloquentDimensionRepository'
        );

        $this->app->bind(
            'App\Repositories\PiSelectionRepository\PiSelectionRepository',
            'App\Repositories\PiSelectionRepository\EloquentPiSelectionRepository'
        );

        $this->app->bind(
            'App\Repositories\BiDimensionRepository\BiDimensionRepository',
            'App\Repositories\BiDimensionRepository\EloquentBiDimensionRepository'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
