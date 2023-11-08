@include('templates.header')

@section('content')
    <div id="minHeight" class="container-smaller m-b-30 m-t-30 p-5">
            <div class="col-md-6 col-xs-12 ajust-height" style="min-height: 123px;">
                <div class="m-b-5 card-box "><h4 class="m-t-0 m-b-20 header-title"><b>Dados do Cliente</b></h4>
                    <div class="row">
                        <div class="col-lg-4"><span class="each-label-details">Cliente:</span></div>
                        <div class="col-lg-8"> {{  $data['nome'] }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"><span class="each-label-details">Documento:</span></div>
                        <div class="col-lg-8"> {{  $data['cpf'] }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"><span class="each-label-details">Plano:</span></div>
                        <div class="col-lg-8"> {{ $data['plano']  }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"><span class="each-label-details">Contrato:</span></div>
                        <div class="col-lg-8"> {{ $data['contrato']  }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"><span class="each-label-details">Cidade:</span></div>
                        <div class="col-lg-8"> {{ $data['cidade']  }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4"><span class="each-label-details">Valor:</span></div>
                        <div class="col-lg-8"> {{ $data['valor']  }}</div>
                    </div>
                </div>
            </div>

            <div id="content-tabs-link" class="col-lg-6 col-xs-12 ">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#card" data-status="v" aria-controls="home" role="tab" data-toggle="tab"> Salvar dados do cartão</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="card">
                        <form method="post" id="saveCard" data-companyurl="maxplanet" data-id="4001"
                              data-yapay="payment-form" novalidate="novalidate">
                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            <input type="hidden" name="hash" value="{{ $data['hash']  }}">
                            <div class="m-b-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group"><label for="numberCard" class="required-field">Número
                                                        do cartão <span class="asterisk">*</span> </label> <input
                                                            type="text" id="numberCard" name="cartao"
                                                            class="form-control mask-credit-card"
                                                            placeholder="Exemplo: 3333333333333333" maxlength="20">
                                                    <span id="invalidCard" class="text-danger ml-5" style="display:
                                                    none;">cartão
                                                        invalido!</span>

                                                </div>
                                            </div>
                                            <div class="col-md-5 form-group has-feedback has-success"><label
                                                        for="brandId" class="required-field">Bandeira <span
                                                            class="asterisk">*</span> </label> <select id="brandId"
                                                                                                       name="bandeira"
                                                                                                       class="form-control"
                                                                                                       aria-required="true"
                                                                                                       aria-invalid="false">
                                                    <option value="">Selecione</option>
                                                    <option value="1">Visa</option>
                                                    <option value="2">MasterCard</option>
                                                    <option value="4">Discover</option>
                                                    <option value="5">Elo</option>
                                                    <option value="6">Amex</option>
                                                    <option value="9">Hipercard</option>
                                                </select> <span
                                                        class="brandId-errorBrandCard text-danger error-validate"
                                                        style="display: none;"></span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="holderCard" class="required-field"> Nome
                                                escrito no cartão <span class="asterisk">*</span> </label> <input
                                                    type="text" id="holderCard" name="nome"
                                                    class="form-control inputmask text-uppercase"
                                                    placeholder="Exemplo: MARIA LUIZA C SOUSA"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="validateCard" class="required-field">
                                                Validade <span class="asterisk">*</span> </label> <input type="text"
                                                                                                         id="validateCard"
                                                                                                         name="validade"
                                                                                                         class="form-control inputmask mask-month-year external"
                                                                                                         placeholder="Exemplo: 12/2023"
                                                                                                         maxlength="7">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="cvvCard" class="required-field">Código de
                                                Segurança<span class="asterisk">*</span></label> <input type="text"
                                                                                                        id="cvvCard"
                                                                                                        name="cvv"
                                                                                                        class="form-control inputmask requiredField"
                                                                                                        placeholder="Exemplo: 123"
                                                                                                        aria-required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group"><label for="cvvCard" class="required-field">CPF do titular
                                                <span class="asterisk">*</span></label> <input required type="text"
                                                                                                        id="cpf"
                                                                                                        name="cpf"
                                                                                                        class="form-control inputmask requiredField"
                                                                                                        placeholder="Exemplo: 123.456.789.00"
                                                                                                        aria-required="true">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group m-b-30">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <button id="btnSubmit" class="btn-font-xs btn btn-primary col-xs-12
                                            waves-effect
                                            waves-light "
                                                    name="authorize" type="submit">
                                                <div class="col-xs-1 p-0"><i class="fa fa-check"></i></div>
                                                <div class="col-xs-11 p-0">
                                                    <div class="text-center white-space-normal">
                                                        Confirmar
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
    </div>


@show

@include('templates.footer')
