@extends('layouts.terminal')

@section('content')
    @php
        /** @var $terminal \App\Models\Terminal */
        $terminal = auth()->guard('terminal')->user();
        /** @var $partner \App\Models\Project */
        $partner = $terminal->project;
    @endphp
    <div class="main-content" x-data="terminalData()">
        <div class="container mt-4 mt-md-5 mb-6">

            <div x-show="!showOrderForm" class="centered-area text-center">

                <a href="#" @click.prevent="showOrderForm = true" class="btn btn-purple hover-lift btn-lg text-center w-40 py-4">Create new order</a>

            </div>

            <form action="{{ route('terminal.order') }}" x-show="showOrderForm" x-cloak class="centered-area"> @csrf
                <div class="col-lg-8 col-sm-12 row">
                    <div class="col-12 mb-3 row align-items-center">
                        <div class="col-sm-4 col-lg-3 p-2">
                            <label class="d-block form-label" for="order_id_required">Order ID</label>
                        </div>
                        <div class="col-sm-8 col-lg-9 p-2">
                            <input type="text" class="form-control" id="order_id_required"  @if($partner->order_id_required) required @endif
                            name="external_order_id">
                        </div>
                    </div>

                    <div class="col-12 mb-3 row align-items-center">
                        <div class="col-sm-4 col-lg-3 p-2">
                            <label class="d-block form-label" for="sum">SUM</label>
                        </div>
                        <div class="col-sm-8 col-lg-9 p-2">
                            <input type="number" required placeholder="12.23$" min="0.01" step="0.01" class="form-control" id="sum" name="sum">
                        </div>
                    </div>
                    @if(!$partner->automation)
                    <div class="col-12 mb-3 row align-items-start">
                        <div class="col-sm-4 col-lg-3 p-2">
                            <label class="d-block form-label mb-2" for="purpose">Pay for</label>
                            <small class="text-muted">Specify purpose of payment or contents of the order</small>
                        </div>
                        <div class="col-sm-8 col-lg-9 p-2">
                            <textarea name="comment" id="purpose" cols="30" rows="4" required minlength="15" class="form-control mb-2"
                                placeholder="Product name 1 - Quantity - Price {{ "\r" }}Product name 2 - Quantity - Price"></textarea>
                            <small class="text-muted">Minimum 15 symbols</small>
                        </div>
                    </div>
                    @else
                        <div class="col-12 mb-3 row align-items-center">
                            <div class="col-sm-4 col-lg-3 p-2">
                                <label class="d-block form-label mb-2" for="purpose">Upload bill photo</label>
                                <small></small>
                            </div>
                            <div class="col-sm-8 col-lg-9 p-2">
                            <textarea name="comment" id="purpose" cols="30" rows="5" class="form-control mb-2"
                                      placeholder="Product name 1 - Quantity - Price
                                Product name 2 - Quantity - Price"></textarea>
                                <small class="text-muted">Minimum 15 symbols</small>
                            </div>
                        </div>
                    @endif
                    <div class="col-12 mb-3 row align-items-center">
                        <div class="col-sm-4 col-lg-3 p-2">
                            <label class="d-block form-label mb-2" for="payment-image">Upload bill photo</label>
                            <small class="text-muted">AUTOMATION !== null </small>
                        </div>
                        <div class="col-sm-8 col-lg-9 p-2">
                            <input type="file" class="form-control" name="payment-image" id="payment-image">
                        </div>
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <button class="btn btn-darkblue btn-lg mx-2">Confirm Order</button>
                        <a href="#" @click.prevent="showOrderForm = false" class="btn btn-pastel-danger btn-lg mx-2">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        function terminalData() {
            return {
                showOrderForm: false,
            }
        }
    </script>
@endsection
