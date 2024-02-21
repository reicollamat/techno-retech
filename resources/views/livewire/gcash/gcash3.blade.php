<div class="bg-light rounded-lg border shadow-md relative text-left p-4 pb-5 my-4 mx-auto w-25">
    <div class="text-gray-500 mb-4">
        <div>
          <div>Merchant</div>
          <div>Amount Due: {{$total}}</div>
        </div>
    </div>
    <div class="mt-20 text-center">
        <h3 class="d-flex justify-content-center text-xl font-semibold mb-6">Login to pay with<p class="text-primary ml-1">GCash</p></h3>
        <p class="text-gray-500 text-center mb-6">Enter your 4-digit MPIN</p>
    </div>
    <div class="mx-auto w-3/4">
        <div class="relative">
          <div class="mb-6">
            <label
              for="number"
              class="block mb-2 text-sm font-medium text-gray-900 dark:text-light"
            ></label>
            <input
              type="tel"
              id="number"
              class="bg-light border border-gray-300 text-black-500 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full p-2.5"
              placeholder=""
              required
            />
          </div>
        </div>
    </div>
    <div class="mt-12 flex justify-center no-underline">
        <button wire:click="save()" target="_blank" class="bg-blue-500 text-light rounded-full py-2 px-16 no-underline">
          Submit Code
        </button>
    </div>
    <div class="mt-4 mb-4 flex justify-center no-underline"></div>
</div>