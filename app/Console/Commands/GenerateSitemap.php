<?php

namespace App\Console\Commands;

use App\Models\AllJobs;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add static routes
        $staticRoutes = [
            '/',
            '/home',
            '/jobs',
            '/contact',
            '/events',
            '/blog',
            '/attractions',
            '/submit-listing',
            '/about',
            '/government-details',
            '/printing',
            '/tourism',
            '/etrading',
            '/website-designing-and-development',
            '/terms-and-conditions',
            '/board-of-directors',
            '/refund-policy',
            '/privacy-policy',
            '/how-it-work',
        ];

        foreach ($staticRoutes as $route) {
            $sitemap->add(Url::create($route)
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        }

        // Add dynamic routes for jobs
        $jobs = AllJobs::all(); // Replace this with your actual Job model
        foreach ($jobs as $job) {
            $sitemap->add(Url::create("/job-details/{$job->url}")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate($job->updated_at));
        }

        // Add dynamic routes for blog posts
        $blogs = \App\Models\Blog::all(); // Replace this with your actual Blog model
        foreach ($blogs as $blog) {
            $sitemap->add(Url::create("/blog-details/{$blog->url}")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setLastModificationDate($blog->updated_at));
        }

        // Add dynamic routes for business
        $business = Category::all(); // Replace this with your actual Blog model
        foreach ($business as $bs) {
            $sitemap->add(Url::create("/bussiness/{$bs->url}")
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setLastModificationDate($bs->updated_at));
        }

        // Write the sitemap to the public directory
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully!');
    }

}
