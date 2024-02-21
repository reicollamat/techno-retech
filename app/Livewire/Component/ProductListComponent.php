<?php

namespace App\Livewire\Component;

use App\Models\CaseFan;
use App\Models\ComputerCase;
use App\Models\Cpu;
use App\Models\CpuCooler;
use App\Models\ExtStorage;
use App\Models\Headphone;
use App\Models\IntStorage;
use App\Models\Keyboard;
use App\Models\Memory;
use App\Models\Monitor;
use App\Models\Motherboard;
use App\Models\Mouse;
use App\Models\Product;
use App\Models\Psu;
use App\Models\Seller;
use App\Models\Speaker;
use App\Models\User;
use App\Models\VideoCard;
use App\Models\Webcam;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductListComponent extends Component
{
    public $product_id;

    #[Validate('required', message: 'Please provide product name')]
    public $product_name;

    #[Validate('required', message: 'Please provide product SKU')]
    public $product_sku;

    #[Validate('required', message: 'Please provide product slug')]
    public $product_slug;

    #[Validate('required', message: 'Please provide product description')]
    public $product_description;

    #[Validate('required|not_in:Select Condition', message: 'Please provide product condition')]
    public $product_condition;

    #[Validate('required|not_in:Select Status', message: 'Please provide product status')]
    public $product_status;

    #[Validate('required|numeric', message: 'Please provide product weight')]
    public $product_weight;

    public $product_category;

    #[Validate('required|integer', message: 'Please provide product price')]
    public $product_price;

    #[Validate('required', message: 'Please provide stocks available')]
    public $product_stock;

    #[Validate('required', message: 'Please provide a reserve stock if available')]
    public $product_reserve;

    #[Locked]
    public $seller_id;

    // public function mount($productCategory)
    //{

    // $this->productCategory = $productCategory;
    //}

    public function render()
    {
        return view('livewire.component.product-list-component');
    }

    public function submit()
    {
        // dd('tst');
        $validator = $this->validate([
            'product_name' => 'required',
            // 'product_slug' => 'required',
            // 'product_description' => 'required',
            'product_condition' => 'required|not_in:Select Condition',
            'product_status' => 'required|not_in:Select Status',
            'product_weight' => 'required|numeric',
            'product_category' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required|integer',
            'product_reserve' => 'required|integer',
        ]);

        // dd($this->product_id);

        $product = Product::find($this->product_id);

        // Define a map of categories to their respective models
        $categoryMap = [
            'computer_case' => ComputerCase::class,
            'case_fan' => CaseFan::class,
            'cpu' => Cpu::class,
            'cpu_cooler' => CpuCooler::class,
            'ext_storage' => ExtStorage::class,
            'int_storage' => IntStorage::class,
            'headphone' => Headphone::class,
            'keyboard' => Keyboard::class,
            'memory' => Memory::class,
            'monitor' => Monitor::class,
            'motherboard' => Motherboard::class,
            'mouse' => Mouse::class,
            'psu' => Psu::class,
            'speaker' => Speaker::class,
            'video_card' => VideoCard::class,
            'webcam' => Webcam::class,
        ];

        // Check if the category exists in the category map
        if (array_key_exists($product->category, $categoryMap)) {
            // Get the corresponding model class for the category
            $modelClass = $categoryMap[$product->category];

            // Resolve the model using the model class and product_id
            $categoryproduct = app()->make($modelClass)->where('product_id', $product->id)->get()->first();
            // dd($categoryproduct);

            // Update the category product with the new data
            $categoryproduct->update([
                'name' => $this->product_name,
                'price' => $this->product_price,
                'condition' => $this->product_condition,
                'status' => $this->product_status,
            ]);
        } else {
            // Handle the case when the category doesn't exist
            abort(404);
        }

        $product->update([
            'title' => $this->product_name,
            'slug' => $this->product_slug,
            'category' => $this->product_category,
            'price' => $this->product_price,
            'stock' => $this->product_stock,
            'reserve' => $this->product_reserve,
            'condition' => $this->product_condition,
            'status' => $this->product_status,
            'weight' => $this->product_weight,
        ]);

        // dd($this->product_name);

        sleep(0.5);

        $this->redirect(route('product-list'));

        // // 'COLUMN NAME IN DATABASE' => $validator['VALUE']
        // $product = Product::create([
        //     'seller_id' => User::find(Auth::user()->id)->seller->id,
        //     'title' => $validator['product_name'],
        //     'slug' => $validator['product_slug'],
        //     'category' => $validator['product_category'],
        //     'price' => $validator['product_price'],
        //     'stock' => $validator['product_stock'],
        //     'reserve' => $validator['product_reserve'],
        //     // 'image' => implode(',', $storeas),
        //     // 'image' => count($storeas) > 0 ? $storeas : ['img/no-image-placeholder.png'],
        //     'condition' => $validator['product_condition'],
        //     'status' => $validator['product_status'],
        //     'weight' => $validator['product_weight'],
        // ]);
    }

    public Model $item;

    public Model $itemproductinfo;

    private $categoryMap = [
        'computer_case' => ComputerCase::class,
        'case_fan' => CaseFan::class,
        'cpu' => Cpu::class,
        'cpu_cooler' => CpuCooler::class,
        'ext_storage' => ExtStorage::class,
        'int_storage' => IntStorage::class,
        'headphone' => Headphone::class,
        'keyboard' => Keyboard::class,
        'memory' => Memory::class,
        'monitor' => Monitor::class,
        'motherboard' => Motherboard::class,
        'mouse' => Mouse::class,
        'psu' => Psu::class,
        'speaker' => Speaker::class,
        'video_card' => VideoCard::class,
        'webcam' => Webcam::class,
    ];

    /**
     * @throws BindingResolutionException
     */
    public function mount($item, $itemProductInfo)
    {
        // $this->seller_id = Seller::find(Auth::user()->id)->select('id')->first() ?? null;
        // dd($this->seller_id);

        //        dd($itemProductInfo->slug);
        //        $this->item = Product::join($item->category, $item->id, '=', $item->category . '.product.id');

        //        dd(Product::join($item->category, $item->id, '=', $item->category . '.product.id'));
        //        $test = DB::table($item->category)->join('products', $item->category . '.product_id', '=', 'products.id');

        //        dd($item->category . '.product_id');
        //        dd($test);
        // Check if the category exists in the category map
        if (array_key_exists($item->category, $this->categoryMap)) {
            // Get the corresponding model class for the category
            $modelClass = $this->categoryMap[$item->category];

            // Resolve the model using the model class and product_id
            $this->item = app()->make($modelClass)->where('product_id', $item->id)->first();

        //            $this->item = app()->make($modelClass)
        //                ->join('products', , '=', 'products.id')
        //                ->where('product_id', $item->id)->first();
        //
        //            dd($this->item);
        } else {
            // Handle the case when the category doesn't exist
            abort(404);
        }
        //        dd($this->item);
        $this->itemproductinfo = $itemProductInfo;

        // dd($itemProductInfo);

        $this->product_id = $itemProductInfo['id'];
        $this->product_name = $itemProductInfo['title'];
        $this->product_slug = $itemProductInfo['slug'];
        $this->product_status = $itemProductInfo['status'];
        $this->product_condition = $itemProductInfo['condition'];
        $this->product_price = $itemProductInfo['price'];
        $this->product_stock = $itemProductInfo['stock'];
        $this->product_category = $itemProductInfo['category'];
        $this->product_reserve = $itemProductInfo['reserve'] ?? 0;
        $this->product_weight = $itemProductInfo['weight'];

        // dd($itemProductInfo);

    }

    // public function removeProduct(Product $product_id)
    // {
    //     dd('' . $product_id . '' . $this->seller_id);
    // }

}
