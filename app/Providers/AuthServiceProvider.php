<?php

namespace App\Providers;

use App\Models\Autoevaluation;
use App\Models\Coevaluation;
use App\Models\Evaluation;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\Promotion;
use App\Models\Topic;
use App\Policies\AutoevaluationPolicy;
use App\Policies\CoevaluationPolicy;
use App\Policies\CompetencePolicy;
use App\Policies\EvaluationPolicy;
use App\Policies\PromotionPolicy;
use App\Policies\TopicPolicy;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Competence::class => CompetencePolicy::class,
        Promotion::class => PromotionPolicy::class,
        Topic::class => TopicPolicy::class,
        Evaluation::class => EvaluationPolicy::class,
        Autoevaluation::class => AutoevaluationPolicy::class,
        Coevaluation::class => CoevaluationPolicy::class,

    ];

    public function boot()
    {
        $this->registerPolicies();

        // ...
    }
}
