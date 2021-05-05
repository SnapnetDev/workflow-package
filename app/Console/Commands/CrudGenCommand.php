<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class CrudGenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:gen {model} {view}';

    private $model = null;
    private $view = null;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */

    function getParams(){
        $this->model = $this->argument('model');
        $this->view = $this->argument('view');
        $this->info('Getting input params');
    }

    function runCreateMigrations()
    {
        $this->info('Generating models, controllers and migrations ... ');
        Artisan::call("make:model $this->model -a");
    }

    function genViewScafolldings(){

        $index = Storage::disk('views_disk')->get('crud-scafolds/views/index.blade.stub');
        $index = $this->interpolateString($index,[
            'model'=>$this->model,
            'view'=>$this->view
        ]);

        $create = Storage::disk('views_disk')->get('crud-scafolds/views/create.blade.stub');
        $create = $this->interpolateString($create,[
            'model'=>$this->model,
            'view'=>$this->view
        ]);


        $edit = Storage::disk('views_disk')->get('crud-scafolds/views/edit.blade.stub');
        $edit = $this->interpolateString($edit,[
            'model'=>$this->model,
            'view'=>$this->view
        ]);


        Storage::disk('views_disk')->put("$this->view/index.blade.php",$index);
        Storage::disk('views_disk')->put("$this->view/create.blade.php",$create);
        Storage::disk('views_disk')->put("$this->view/edit.blade.php",$edit);

        $this->info('Views scafolding generated.');

    }

    function interpolateString($str,$data){
        foreach ($data as $indicator=>$item){
           $str = explode("{{{$indicator}}}",$str);
           $str = implode($item,$str);
        }
        return $str;
    }

    function generateModelTraits(){

        $template = Storage::disk('views_disk')->get('crud-scafolds/traits/gen-model-trait.stub');

        $template = $this->interpolateString($template,[

            'model'=>$this->model

        ]);

        $file = $this->model . 'Trait.php';

        Storage::disk('app_disk')->put("Traits/ModelTraits/$file",$template);

        $this->info("$file generated .... ");

    }

    function addResourceRoute(){
        $route = Storage::disk('views_disk')->get('crud-scafolds/routes/gen-route.stub');
        $route = $this->interpolateString($route,[
            'model'=>$this->model,
            'view'=>$this->view
        ]);
        $oldRoute = Storage::disk('route_disk')->get('web.php');
        Storage::disk('route_disk')->put('web.php',$oldRoute . "\n" . $route);

        $this->info('resource route added ' . $this->view);

    }



    public function handle()
    {

//        $str = 'cool {{nice}} okay';
//        $r = $this->interpolateString($str,[
//            'nice'=>'9ice'
//        ]);
//        dd($r);

        $this->getParams();

        $this->genViewScafolldings();

        $this->generateModelTraits();

        $this->addResourceRoute();

        $this->runCreateMigrations();

        $this->info('CRUD Scafollding creeated.');

        return 0;

    }


}
