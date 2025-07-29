<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Usuário') }}
        </h2>
    </x-slot>

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0"> {{ __('Usuário') }}</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="{{ route('user.lista') }}" class="btn btn-sm btn-secondary radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="mynaui:arrow-left" class="icon text-lg"></iconify-icon>
                    Voltar
                </a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2">
                <a href="{{route("users.edit", $data->id)}}" class="btn btn-sm btn-success radius-8 d-inline-flex align-items-center gap-1">
                    <iconify-icon icon="uil:edit" class="text-xl"></iconify-icon>
                    Editar
                </a>
              <a href="javascript:void(0)" class="btn btn-sm btn-warning radius-8 d-inline-flex align-items-center gap-1">
        <iconify-icon icon="solar:download-linear" class="text-xl"></iconify-icon>
        Download
      </a>
            </div>
        </div>
        <div class="card-body py-40">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="shadow-4 border radius-8">
                        <div class="p-20 d-flex flex-wrap justify-content-between gap-3 border-bottom">
                            <div>
                                <h3 class="text-xl">Usuário #<small>{{ $data->id }}</small></h3>
                                <div>
                                        <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">ID:</span> <small>{{ $data->id }}</small></p>
                                        <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">Nome:</span> <small>{{ $data->name }}</small></p>
                                        <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">E-mail:</span> <small>{{ $data->email }}</small></p>
                                        <p class="text-sm mb-2"><span class="text-primary-light fw-semibold">CPF:</span> <small>{{ $data->cpf }}</small></p>
                                        <p class="text-sm mb-0"><span class="text-primary-light fw-semibold">WhatsApp:</span> <small>{{ $data->whatsapp }}</small></p>
                                        <p class="text-sm mb-0 "><span class="text-primary-light  fw-semibold">Associado:</span> <small>{{$currentUserGroupId}}</small></p>
                                    </div>
                            </div>
                        </div>
                        <div class="py-28 px-20">
                            <div class="mt-24">
                                <div class="d-flex flex-wrap justify-content-between gap-3">
                                   
                                </div>
                            </div>
                            <div class="mt-64">
                                <p class="text-center text-secondary-light text-sm fw-semibold">Detalhes do Usuário</p>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between align-items-end mt-64">

                                <div class="text-sm border-top d-inline-block px-12">Sistema de Cadastro de Usuários</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>