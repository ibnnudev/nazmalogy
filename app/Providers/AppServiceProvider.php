<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Interfaces\CourseInterface::class, \App\Repositories\CourseRepository::class);
        $this->app->bind(\App\Interfaces\CourseCategoryInterface::class, \App\Repositories\CourseCategoryRepository::class);
        $this->app->bind(\App\Interfaces\PlaylistInterface::class, \App\Repositories\PlaylistRepository::class);
        $this->app->bind(\App\Interfaces\CourseChapterInterface::class, \App\Repositories\CourseChapterRepository::class);
        $this->app->bind(\App\Interfaces\QuizInterface::class, \App\Repositories\QuizRepository::class);
        $this->app->bind(\App\Interfaces\QuestionInterface::class, \App\Repositories\QuestionRepository::class);
        $this->app->bind(\App\Interfaces\PointTypeInterface::class, \App\Repositories\PointTypeRepository::class);
        $this->app->bind(\App\Interfaces\PointInterface::class, \App\Repositories\PointRepository::class);
        $this->app->bind(\App\Interfaces\GeneralTestimonialInterface::class, \App\Repositories\GeneralTestimonialRepository::class);
        $this->app->bind(\App\Interfaces\TransactionInterface::class, \App\Repositories\TransactionRepository::class);
        $this->app->bind(\App\Interfaces\CourseChapterReviewInterface::class, \App\Repositories\CourseChapterReviewRepository::class);
        $this->app->bind(\App\Interfaces\FacilitatorInterface::class, \App\Repositories\FacilitatorRepository::class);
        $this->app->bind(\App\Interfaces\LearningInterface::class, \App\Repositories\LearningRepository::class);
        $this->app->bind(\App\Interfaces\UserCourseChapterLogInterface::class, \App\Repositories\UserCourseChapterLogRepository::class);
        $this->app->bind(\App\Interfaces\CourseLastTaskInterface::class, \App\Repositories\CourseLastTaskRepository::class);
        $this->app->bind(\App\Interfaces\SubmissionInterface::class, \App\Repositories\SubmissionRepository::class);
        $this->app->bind(\App\Interfaces\ReferalInterface::class, \App\Repositories\ReferalRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
