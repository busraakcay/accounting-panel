<div class="modal fade billView">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Fatura Görüntüle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table borderless table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Firma</th>
                            <td>{{ $companyName }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mal Hizmet</th>
                            <td>{{ $productName }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Miktar</th>
                            <td>{{ $quantity }} {{ $quantityType }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Birim Fiyat</th>
                            <td>@money($unitPrice)</td>
                        </tr>
                        <tr>
                            <th scope="row">Fatura Tarihi</th>
                            <td> {{ $billDate }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Fatura Türü</th>
                            <td>{{ $billType == 1 ? 'Nakit' : 'Vadeli' }}</td>
                        </tr>
                        <tr>
                            <th scope="row">KDV Oranı</th>
                            <td> %{{ $vatRate }} </td>
                        </tr>
                        <tr>
                            <th scope="row">KDV Tutarı</th>
                            <td>@money($vatAmount)</td>
                        </tr>

                        <tr>
                            <th scope="row">İskonto Oranı</th>
                            <td> %{{ $discountRateofInc }} </td>
                        </tr>
                        <tr>
                            <th scope="row">İskonto Tutarı</th>
                            <td>@money($discountIncAmount)</td>
                        </tr>
                        <tr>
                            <th scope="row">İskonto Nedeni</th>
                            <td> {{ $reasonforDiscountInc }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Diğer Vergiler</th>
                            <td> {{ $otherTaxes }} </td>
                        </tr>
                        <tr>
                            <th scope="row">Mal Hizmet Tutarı</th>
                            <td> @money($totalAmount) </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>