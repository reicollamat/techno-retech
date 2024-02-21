<div>
    {{-- Success is as dangerous as failure. --}}
    <form wire:submit="submit">

        <div class="mb-4 p-4 bg-white border border-gray-200 rounded-lg">
            <div>
                <!-- Product Name input -->
                <div class="mb-4">
                    <label for="product_name"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                        Name</label>
                    <input type="text" id="product_name" wire:model.blur="productName"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Product Name" required>
                    @error('productName')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- Product Description -->
            <div class="mb-4">
                <label for="description"
                    class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Description</label>
                <textarea id="description" rows="4" wire:model.blur="productDescription"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..." required></textarea>
                @error('productDescription')
                <span class="font-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid md:grid-cols-3 md:gap-8 ">
                <div>
                    <!-- Product Condition input -->
                    <div class="mb-4">
                        <label for="condition"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product
                            Condtion</label>
                        <select id="condition" wire:model.blur="productCondition" name="condition"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Select Condition</option>
                            <option value="brand_new">Brand New</option>
                            <option value="used">Used</option>
                        </select>
                        @error('productCondition')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div>
                    <!-- Product Status input -->
                    <div class="mb-4">
                        <label for="status"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                            Status</label>
                        <select id="status" wire:model.blur="productStatus" name="status"
                            class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option>Select Status</option>
                            <option value="available">Available</option>
                            <option value="unavailable">Unavailable</option>
                        </select>
                        @error('productStatus')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- Product Weight -->
                <div class="mb-4">
                    <label for="product_weight"
                        class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product Weight (in
                        KG)
                    </label>
                    <input type="number" id="product_weight" wire:model.blur="product_weight" min="0.01" step="0.01"
                        class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="0.30" required>
                    @error('product_weight')
                    <span class="font-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-4 p-4 bg-white border border-gray-200 rounded-lg">
            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    {{-- First Columm --}}

                    <!-- Brand -->
                    <div class="mb-4">
                        <label for="brand"
                            class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Product
                            Brand</label>
                        <input type="text" id="brand" wire:model.blur="brand"
                            class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Acer, LG, Asus, etc." required>
                        @error('brand')
                        <span class="font-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Product
                                Price</label>
                            <input type="text" id="price" wire:model.blur="price"
                                class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="In Pesos, 1000.00" required>
                            @error('price')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Reso -->
                        <div class="mb-4">
                            <label for="native_resolution"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                                Display Resolution
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="The number of pixels in each dimension that can be displayed on a screen.">
                                    <i class="bi bi-patch-question"></i>
                                </span></label>
                            <select id="native_resolution" wire:model.blur="native_resolution"
                                class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Click to Select</option>
                                <option value="wide1">1920x1080</option>
                                <option value="wide2">2560x1440</option>
                                <option value="wide4k">3840x2160 (4K)</option>
                                <option value="wide5k">5120x2880 (5K)</option>
                                <option value="uwide1">2560x1080</option>
                                <option value="uwide2">3440x1440</option>
                                <option value="uwide3">3840x1600</option>
                                <option value="uwide5k">5120x2160 (5K)</option>
                                <option value="suwide1">3840x1200</option>
                                <option value="suwide2">3840x1080</option>
                                <option value="suwide3">5120x1440</option>
                            </select>
                            @error('native_resolution')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Panel -->
                        <div class="mb-4">
                            <label for="panel_type"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                                Display Resolution
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="The number of pixels in each dimension that can be displayed on a screen.">
                                    <i class="bi bi-patch-question"></i>
                                </span></label>
                            <select id="panel_type" wire:model.blur="panel_type"
                                class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Click to Select</option>
                                <option value="IPS">IPS</option>
                                <option value="VA">VA</option>
                                <option value="TN">TN</option>
                            </select>
                            @error('panel_type')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">

                        <!-- Input -->
                        <div class="mb-4">
                            <label for="input_signal"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                                Input Signal
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="Hold down the Ctrl or Command key to select multiple options.">
                                    <i class="bi bi-patch-question"></i>
                                </span>

                            </label>
                            <select id="input_signal" wire:model.blur="input_signal" multiple
                                class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Click to Select</option>
                                <option value="hdmi">HDMI</option>
                                <option value="2hdmi">2xHDMI</option>
                                <option value="vga">VGA</option>
                                <option value="dport">Display Port</option>
                                <option value="usbC">USB-C</option>
                            </select>
                            @error('input_signal')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!--Refresh Rate -->
                        <div class="mb-4">
                            <label for="refresh_rate"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                                Refresh Rate
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="The frequency that a display updates the onscreen image.">
                                    <i class="bi bi-patch-question"></i>
                                </span></label>
                            <select id="refresh_rate" wire:model.blur="refresh_rate"
                                class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Click to Select</option>
                                <option value="<70">Up to 70 Hz</option>
                                <option value="70_100">70 to 100 Hz</option>
                                <option value="100_150">100 to 150 Hz</option>
                                <option value="150_200">150 to 200 Hz</option>
                                <option value=">200">200 Hz & above</option>
                            </select>

                            @error('refresh_rate')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-4">

                        <!-- Screen Size -->
                        <div class="mb-4">
                            <label for="screen_size"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white pl-1">Screen Size
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="Enter the accurate screen size">
                                    <i class="bi bi-patch-question"></i>
                                </span></label>
                            <input type="text" id="screen_size" wire:model.blur="screen_size"
                                class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="22.9, 17.9, 39.9 etc." required>
                            @error('screen_size')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Aspect Ratio -->
                        <div class="mb-4">
                            <label for="aspect_ratio"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">
                                Aspect Ratio
                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover"
                                    data-bs-trigger="hover focus" data-bs-placement="top"
                                    data-bs-content="The frequency that a display updates the onscreen image.">
                                    <i class="bi bi-patch-question"></i>
                                </span></label>
                            <select id="aspect_ratio" wire:model.blur="aspect_ratio"
                                class="bbg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option>Click to Select</option>
                                <option value="16:9">16:9</option>
                                <option value="4:3">4:3</option>
                                <option value="21:9">21:9</option>
                                <option value="32:9">32:9</option>
                            </select>

                            @error('aspect_ratio')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <!-- Stocks and Reserved -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="stocks"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Stocks
                            </label>
                            <input type="text" id="stocks" wire:model.blur="stocks"
                                class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Stock Currently On-Hand" required>
                            @error('stocks')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="reserve_stocks"
                                class="block mb-1 text-sm font-medium text-gray-800 dark:text-white  pl-1">Reserved
                                Stocks</label>
                            <input type="text" id="reserve_stocks" wire:model.blur="reserve_stocks"
                                class="bg-white border border-gray-300 text-gray-900 text-sm !rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Stock to Hold" required>
                            @error('reserve_stocks')
                            <span class="font-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Add Product Image Div -->
                    <div class="pb-3">
                        <p class="block mb-1 text-base font-medium text-gray-600 dark:text-white pl-1">Add Product
                            Image
                        </p>
                        <p class="block mb-1 text-sm font-medium text-gray-500 dark:text-white pl-1">To Upload Multiple
                            Images,
                            Select them all before uploading</p>
                    </div>

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to
                                        upload</span>
                                    or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)
                                </p>
                            </div>
                            <input id="dropzone-file" type="file" wire:model="productImages" class="hidden" multiple />
                            @error('productImages.*')
                            <span class="error">{{ $message }}</span>
                            @enderror
                        </label>
                    </div>

                    <div wire:loading wire:target="productImages">Uploading...</div>

                    <div class="py-3">
                        <p class="block mb-1 text-sm font-medium text-gray-600 dark:text-white  pl-1">Image Preview
                            (Click
                            Image
                            To Preview)</p>
                    </div>

                    <div x-data="{ showModal: false }" @keydown.window.escape="showModal = false">
                        <div class="grid md:grid-cols-3 gap-1 h-auto">
                            @if ($productImages)
                                @foreach ($productImages as $image)
                                    <!-- Button trigger modal -->
                                    <button type="button" @click="showModal = !showModal" data-bs-target="#exampleModal"
                                            wire:key="{{ $loop->index }}"
                                            wire:click="setImage('{{ $image->temporaryUrl() }}', {{ $loop->index }})">
                                        <img class="h-auto max-w-full border border-gray-400" src="{{ $image->temporaryUrl() }}"
                                             alt="image description">
                                    </button>
                                @endforeach
                            @endif
                        </div>

                        <div x-cloak x-transition.opacity x-show="showModal" class="fixed inset-0 bg-black/50"></div>

                        <div x-cloak x-transition.duration.500ms x-show="showModal"
                             class="fixed inset-0 z-50 grid place-content-center">
                            <div @click.away="showModal = false"
                                 class="min-h-full rounded-xl min-w-[500px] bg-white items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            {{-- <h1 class="modal-title fs-5" id="exampleModalLabel">Image Preview</h1>
                                            --}}
                                        </div>
                                        <div class="flex justify-center modal-body" x-transition.opacity>
                                            <img class="h-auto max-w-full border border-gray-400"
                                                 src="{{ $previewImage }}" alt="Image Preview">
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex gap-2 pt-3 justify-end">
                                    <button type="button" class="btn btn-outline-danger"
                                            wire:click="removePhoto({{ $previewImageIndex }})" @click="showModal = false">
                                        Remove
                                        Photo
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" @click="showModal = false">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 py-3 flex justify-center items-center bg-white rounded-lg">
            <button type="submit" class="btn btn-outline-danger">Create Product</button>
        </div>
    </form>
</div>
