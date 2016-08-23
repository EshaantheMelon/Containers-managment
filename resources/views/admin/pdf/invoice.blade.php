<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Bill of lading</title>

    <link rel="stylesheet" href="{{ URL::asset('css/pdf.css') }}"/>
</head>

<body>

<main>
    <h1 class="title">Bill of lading</h1>

    <div id="details" >
        <div id="invoice">
            <h1>N° BL: {{ $bill->number }}</h1>
            <div class="date">Date: {{ $bill->created_at->format('m/d/Y') }}</div>
        </div>
    </div>


    <div class="row">
        <div class="col6">

        </div>

        <div class="col-2"></div>

        <div class="col6">
            <table class="table">
                <thead>
                <tr>
                    <th class="desc" colspan="3">Expertise</th>
                </tr>
                <tr>
                    <td>Company</td>
                    <td>Person</td>
                    <td>Date</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="unit">{{ $bill->position->atExpertise->first()->company or '' }}</td>
                    <td class="desc">{{ $bill->position->atExpertise->first()->person or '' }}</td>
                    <td class="desc">{{ $bill->position->atExpertise->first()->date->format('m/d/Y') }}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col6">
            <table class="table info">
                <tbody>
                <tr>
                    <th>Notify</th>
                    <td>{{ $bill->notify }}</td>
                </tr>
                <tr>
                    <th>Vessel</th>
                    <td>{{ $bill->vessel->vessel or '' }}</td>
                </tr>
                <tr>
                    <th>N° Travel</th>
                    <td>{{ $bill->travel->number }}</td>
                </tr>
                <tr>
                    <th>Place of loading</th>
                    <td>{{ $bill->place_of_loading }}</td>
                </tr>
                <tr>
                    <th>Port of loading POL</th>
                    <td>{{ $bill->port_of_loading_pol }}</td>
                </tr>
                <tr>
                    <th>Port of delivery POD</th>
                    <td>{{ $bill->place_of_delivery_pod }}</td>
                </tr>
                <tr>
                    <th>Place of delivery</th>
                    <td>{{ $bill->place_of_delivery }}</td>
                </tr>
                <tr>
                    <th>Number of original BLs</th>
                    <td>{{ $bill->number_original_bls }}</td>
                </tr>
                <tr>
                    <th>Number Packages/Containers</th>
                    <td>{{ $bill->number_packages }}</td>
                </tr>
                <tr>
                    <th>Payment Freight</th>
                    <td>{{ $bill->payment_freight }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br />

    <div class="row">
        <div class="col6">
            <table class="table">
                <thead>
                <tr>
                    <th class="desc" colspan="4">Shipper</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>N° Booking</td>
                    <td>CIN Driver</td>
                    <td>ID Truck</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="desc">{{ $bill->shipper->name_shipper or '' }}</td>
                    <td class="unit">{{ $bill->shipper->booking or '' }}</td>
                    <td class="total">{{ $bill->shipper->cin_driver or ''  }}</td>
                    <td class="total">{{ $bill->shipper->id_truck or '' }}</td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="col-2"></div>

        <div class="col6">
            <table class="table">
                <thead>
                <tr>
                    <th class="desc" colspan="2">Consignee</th>
                </tr>
                <tr>
                    <td>Name Consignee</td>
                    <td>Date OUT Port</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="unit">{{ $bill->consignee->name_consignee or '' }}</td>
                    <td class="desc">{{ isset($bill->consignee->date_out_port) ? $bill->consignee->date_out_port->format('m/d/Y') : ''}}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

    <table class="row table">
        <tr>
            <th colspan="5" style="background: black; color: white">Containers</th>
        </tr>
        <tr>
            <th>N° Container</th>
            <th>Type</th>
            <th>Contract</th>
            <th>N packages</th>
            <th>weight (kg)</th>

        </tr>
        @foreach($bill->position->containers as $container)
            <tr>
                <td>{{ $container->prefix }}</td>
                <td>{{ $container->type }}</td>
                <td>{{ $container->contract->reference }}</td>
                <td>{{ $container->capacity }}</td>
                <td>{{ $container->tare }}</td>
            </tr>
        @endforeach
    </table>

    <br />

    <div class="row">
        <div class="col6">
            <table class="table">
                <thead>
                <tr>
                    <th class="desc" colspan="3">Demurrage</th>
                </tr>
                <tr>
                    <td>Port</td>
                    <td>Free time</td>
                    <td>Tariff</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="unit">{{ $bill->position->surestaries->port->port or ''}}</td>
                    <td class="desc">{{ $bill->position->surestaries->free_time or ''}}</td>
                    <td class="desc">{{ $bill->position->surestaries->tariff or ''}}</td>
                </tr>

                </tbody>
            </table>
        </div>

        <div class="col-2"></div>

        <div class="col6">
            <table class="table">
                <thead>
                <tr>
                    <th class="desc" colspan="4">Quotations</th>
                </tr>
                <tr>
                    <td>Number</td>
                    <td>N° booking</td>
                    <td>Confirmed</td>
                    <td>Condition</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="unit">{{ $bill->position->quotation->number or ''}}</td>
                    <td class="desc">{{ $bill->position->quotation->n_booking or ''}}</td>
                    <td class="desc">{{ $bill->position->quotation->confirmed or ''}}</td>
                    <td class="desc">{{ $bill->position->quotation->condition or ''}}</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>