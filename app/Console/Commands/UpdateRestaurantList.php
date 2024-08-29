<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Services\RestauranteService;

class UpdateRestaurantList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'restaurantes:update-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para actualizar la lista de restaurantes desde el API';

    protected $restauranteService;

    public function __construct(RestauranteService $restauranteService)
    {
        parent::__construct();
        $this->restauranteService = $restauranteService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->restauranteService->apiConexion();
        $this->info('Lista de restaurantes actualizada');
    }
}
