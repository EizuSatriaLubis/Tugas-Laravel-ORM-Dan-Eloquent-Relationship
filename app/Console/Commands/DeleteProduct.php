<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class DeleteProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-product';

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
        // Misalnya, hapus semua produk yang harganya kurang dari 100.000
        Product::where('harga', '<', 100000)->delete();
    
        $this->info('Produk berhasil dihapus.');
    }
    
}
