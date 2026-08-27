<div class="min-h-screen  py-4">
    <div class="mx-auto w-full px-4">

        <div class="flex flex-col gap-6 lg:flex-row">


            <div class="w-full lg:w-1/4">

                <!-- PROFILE -->
                <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                    <div class="p-5">


                        @php
                            $nom = $employee->nom;
                            $post_nom = $employee->post_nom;

                        @endphp

                        <!-- Avatar -->
                        <div class="flex justify-center">
                            <div class="flex h-28 w-28 items-center justify-center overflow-hidden rounded-full border-4 border-gray-100 bg-gray-200">
                                <img
                                    src="https://ui-avatars.com/api/?name={{$nom}}+{{ $post_nom }}&size=200"
                                    alt="Avatar"
                                    class="h-full w-full object-cover"
                                >
                            </div>
                        </div>


                        <h3 class="mt-4 text-center text-xl font-semibold text-gray-800">
                            {{ $employee->full_name }}
                        </h3>

                        <p class="text-center text-sm text-gray-500">
                            {{ $employee->ulid }}
                        </p>


                        <div class="mt-3 flex flex-wrap justify-center gap-2">



                            <span class="rounded bg-green-100 px-2.5 py-1 text-xs font-medium text-green-700">
                                ACtif
                            </span>



                        </div>

                        <!-- Informations -->
                        <ul class="mt-5 divide-y divide-gray-200 rounded border border-gray-200">

                            <li class="flex items-center justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Informations</b>
                                <span class="rounded bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                    Agent
                                </span>
                            </li>

                            <li class="flex items-center justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Nom</b>
                                <span class="text-gray-500">{{ $employee->nom ?? '-'}}</span>
                            </li>

                            <li class="flex items-center justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Postnom</b>
                                <span class="text-gray-500">{{ $employee->post_nom ?? '-' }}</span>
                            </li>

                            <li class="flex items-center justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Prénom</b>
                                <span class="text-gray-500">{{ $employee->prenom ?? '-' }}</span>
                            </li>

                            <li class="flex items-center justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Matricule</b>
                                <span class="text-gray-500">{{ $employee->matricule ?? '-'}}</span>
                            </li>

                        </ul>


                        <button
                            type="button"
                            class="mt-4 flex w-full items-center justify-center gap-2 rounded bg-blue-600 px-4 py-2.5 text-sm font-medium text-white transition hover:bg-blue-700"
                        >
                            <i class="fa fa-file-alt"></i>
                            Fiche de renseignement
                        </button>

                    </div>
                </div>


                <div class="mt-5 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">
                        <h3 class="font-semibold text-gray-800">
                            À propos
                        </h3>
                    </div>

                    <div class="p-5">

                        <div>
                            <strong class="flex items-center gap-2 text-sm text-gray-800">
                                <i class="fas fa-book"></i>
                                Lieu et date de naissance
                            </strong>

                            <p class="mt-2 flex items-center justify-between text-sm text-gray-500">
                                {{ $employee->lieu_naissance ?? '-' }}, le {{ $employee->date_naissance?->format('d/m/Y') }}
                                @if($employee->calculerAge() !== null)
                                    <strong class="rounded bg-cyan-100 px-2 py-1 text-xs text-cyan-700">
                                        {{ $employee->calculerAge() }} ans
                                    </strong>
                                @endif
                            </p>
                        </div>

                        <hr class="my-4 border-gray-200">

                        <div>
                            <strong class="flex items-center gap-2 text-sm text-gray-800">
                                <i class="fas fa-phone-alt"></i>
                                Téléphone
                            </strong>

                            <p class="mt-2 text-sm text-gray-500">
                                {{ $employee->telephone ?? '-' }}
                            </p>
                        </div>

                        <hr class="my-4 border-gray-200">

                        <div>
                            <strong class="flex items-center gap-2 text-sm text-gray-800">
                                <i class="fas fa-envelope"></i>
                                E-mail
                            </strong>

                            <p class="mt-2 break-all text-sm text-gray-500">
                                jean.dupont@example.com
                            </p>
                        </div>

                        <hr class="my-4 border-gray-200">

                        <div>
                            <strong class="flex items-center gap-2 text-sm text-gray-800">
                                <i class="fas fa-map-marker-alt"></i>
                                Adresse
                            </strong>

                            <p class="mt-2 text-sm text-gray-500">
                                Avenue des Écoles, Lubumbashi
                            </p>
                        </div>

                        <hr class="my-4 border-gray-200">

                        <div>
                            <strong class="flex items-center gap-2 text-sm text-gray-800">
                                <i class="fas fa-venus-mars"></i>
                                Sexe
                            </strong>

                            <p class="mt-2 text-sm text-gray-500">
                                {{ $employee->genre?->label() ?? '' }}
                            </p>
                        </div>

                        <hr class="my-4 border-gray-200">

                        <div>
                            <strong class="flex items-center gap-2 text-sm text-gray-800">
                                <i class="fas fa-people-arrows"></i>
                                État civil
                            </strong>

                            <p class="mt-2 text-sm text-gray-500">
                                {{ $employee->situation_familiale->label() ?? '-' }}
                            </p>
                        </div>

                    </div>
                </div>


                <div class="mt-5 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200 px-5 py-4">
                        <h3 class="font-semibold text-gray-800">
                            Parents
                        </h3>
                    </div>

                    <div class="p-5">

                        @php
                            $pere = $employee->families->firstWhere(
                                'type',
                                \App\Enums\FamilyMemberType::PERE
                            );

                            $mere = $employee->families->firstWhere(
                                'type',
                                \App\Enums\FamilyMemberType::MERE
                            );
                        @endphp

                        <ul class="divide-y divide-gray-200 rounded border border-gray-200">

                            {{-- PÈRE --}}
                            <li class="flex justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Père</b>

                                <span class="text-right text-gray-500">

                @if($pere)

                                        <span class="font-medium text-gray-700">
                        {{ $pere->prenom }} {{ $pere->nom }}
                    </span>

                                        <br>

                                        <span class="text-xs text-gray-400">
                        {{ $pere->telephone ?? 'Téléphone : —' }}
                    </span>

                                        <br>

                                        @if($pere->statut_vie === \App\Enums\LifeStatus::EN_VIE)

                                            <span class="mt-1 inline-flex rounded bg-green-100 px-2 py-0.5 text-xs font-medium text-green-700">
                            {{ $pere->statut_vie->label() }}
                        </span>

                                        @else

                                            <span class="mt-1 inline-flex rounded bg-red-100 px-2 py-0.5 text-xs font-medium text-red-700">
                            {{ $pere->statut_vie?->label() ?? '—' }}
                        </span>

                                        @endif

                                    @else

                                        —

                                    @endif

            </span>
                            </li>


                            {{-- MÈRE --}}
                            <li class="flex justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Mère</b>

                                <span class="text-right text-gray-500">

                @if($mere)

                                        <span class="font-medium text-gray-700">
                        {{ $mere->prenom }} {{ $mere->nom }}
                    </span>

                                        <br>

                                        <span class="text-xs text-gray-400">
                        {{ $mere->telephone ?? 'Téléphone : —' }}
                    </span>

                                        <br>

                                        @if($mere->statut_vie === \App\Enums\LifeStatus::EN_VIE)

                                            <span class="mt-1 inline-flex rounded bg-green-100 px-2 py-0.5 text-xs font-medium text-green-700">
                            {{ $mere->statut_vie->label() }}
                        </span>

                                        @else

                                            <span class="mt-1 inline-flex rounded bg-red-100 px-2 py-0.5 text-xs font-medium text-red-700">
                            {{ $mere->statut_vie?->label() ?? '—' }}
                        </span>

                                        @endif

                                    @else

                                        —

                                    @endif

            </span>
                            </li>


                            {{-- ADRESSE COMMUNE --}}
                            <li class="flex justify-between gap-3 px-3 py-3 text-sm">
                                <b class="text-gray-700">Adresse</b>

                                <span class="text-right text-gray-500">
                {{ $employee->adresse_complete ?? '—' }}
            </span>
                            </li>

                        </ul>

                    </div>




                </div>

            </div>


            <!-- =========================
                 COLONNE DROITE
            ========================== -->
            <div class="w-full lg:w-3/4">

                <!-- TABS -->
                <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                    <div class="border-b border-gray-200">

                        <div class="flex overflow-x-auto">

                            <button
                                onclick="showTab('profile', this)"
                                class="tab-button whitespace-nowrap border-b-2 border-blue-600 px-5 py-3 text-sm font-medium text-blue-600"
                            >
                                <i class="fa fa-user mr-1"></i>
                                Profile
                            </button>

                            <button
                                onclick="showTab('admissions', this)"
                                class="tab-button whitespace-nowrap border-b-2 border-transparent px-5 py-3 text-sm font-medium text-gray-500 hover:text-gray-700"
                            >
                                <i class="fa fa-school mr-1"></i>
                                Admissions
                            </button>

                            <button
                                class="whitespace-nowrap border-b-2 border-transparent px-5 py-3 text-sm font-medium text-gray-500 hover:text-gray-700"
                            >
                                <i class="fa fa-camera mr-1"></i>
                                Capture
                            </button>

                            <button
                                class="whitespace-nowrap border-b-2 border-transparent px-5 py-3 text-sm font-medium text-gray-500 hover:text-gray-700"
                            >
                                <i class="fa fa-file-pdf mr-1"></i>
                                Fiche de scolarité
                            </button>

                            <button
                                onclick="showTab('perceptions', this)"
                                class="tab-button whitespace-nowrap border-b-2 border-transparent px-5 py-3 text-sm font-medium text-gray-500 hover:text-gray-700"
                            >
                                <i class="fa fa-money-bill mr-1"></i>
                                Perceptions
                            </button>

                        </div>
                    </div>
                </div>


                <!-- =========================
                     PROFILE TAB
                ========================== -->
                <div id="profile" class="tab-content">
                    <!-- CHILDREN -->
                    <div class="mt-5 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                        <div class="border-b border-gray-200 px-5 py-4">

                            <h4 class="flex items-center gap-2 font-semibold text-gray-800">
                                Enfants

                                <span class="rounded bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                    {{ $employee->children->count() }}
                                </span>
                            </h4>

                        </div>

                        <div class="p-5">

                            <div class="overflow-x-auto">

                                <table class="min-w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-50">

                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            #
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Nom complet
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Date de naissance
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Âge
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Charge
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Statut
                                        </th>
                                    </tr>

                                    </thead>

                                    <tbody class="divide-y divide-gray-200 bg-white">

                                    @forelse($employee->children as $child)

                                        <tr
                                            wire:key="child-{{ $child->id }}"
                                            class="hover:bg-gray-50"
                                        >

                                            <td class="px-4 py-3 text-sm">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                <div>
                                                    <p class="font-medium text-gray-800">
                                                        {{ $child->prenom }}
                                                        {{ $child->nom }}
                                                        @if($child->post_nom)
                                                            {{ $child->post_nom }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                @if($child->date_naissance)
                                                    {{ $child->date_naissance->format('d/m/Y') }}
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                @if($child->date_naissance)
                                                    {{ $child->date_naissance->age }} ans
                                                @else
                                                    <span class="text-gray-400">-</span>
                                                @endif
                                            </td>

                                            <td class="px-4 py-3">

                                                <span class="rounded bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                                                    {{ $child->charge?->label() ?? $child->charge ?? '-' }}
                                                </span>

                                            </td>

                                            <td class="px-4 py-3">

                                                @if($child->statut_vie === \App\Enums\LifeStatus::EN_VIE)

                                                    <span class="rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                        {{ $child->statut_vie->label() }}
                                                    </span>

                                                @else

                                                    <span class="rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                                        {{ $child->statut_vie->label() }}
                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @empty

                                        <tr>

                                            <td
                                                colspan="6"
                                                class="px-4 py-8 text-center text-sm text-gray-500"
                                            >
                                                Aucun enfant enregistré.
                                            </td>

                                        </tr>

                                    @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                    <!-- DIPLOME + CHOIX -->
                    <div class="mt-5 grid grid-cols-1 gap-5 md:grid-cols-2">

                        <!-- DIPLOME -->
                        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                            <div class="border-b border-gray-200 px-5 py-4">
                                <h4 class="font-semibold text-gray-800">
                                    Diplôme
                                </h4>
                            </div>

                            <div class="p-5">

                                <ul class="divide-y divide-gray-200 rounded border border-gray-200">
                                    <li class="flex justify-between gap-4 px-3 py-3 text-sm">
                                        <b>Pièce d'identité</b>
                                        <span class="text-right text-gray-500">
                                            {{ $employee->numero_piece_identite ?? '-' }}
                                        </span>
                                    </li>
                                    <li class="flex justify-between gap-4 px-3 py-3 text-sm">
                                        <b>Date d'expiration de la pièce</b>
                                        <span class="text-right text-gray-500">
                                            {{ $employee->date_expiration_piece?->format('d/m/Y') ?? '-' }}
                                        </span>
                                    </li>

                                    <li class="flex justify-between gap-4 px-3 py-3 text-sm">
                                        <b>Numéro CNSS</b>
                                        <span class="text-right text-gray-500">
                                            {{ $employee->numero_cnss ?? '-' }}
                                        </span>
                                    </li>

                                    <li class="flex justify-between gap-4 px-3 py-3 text-sm">
                                        <b>Département</b>
                                        <span class="text-right text-gray-500">
                                             {{ $employee->department?->name ?? '—' }}
{{--                                            {{ dd($employee->department()) }}--}}
                                        </span>
                                    </li>

                                    <li class="flex justify-between px-3 py-3 text-sm">
                                        <b>École fréquentée</b>
                                        <span class="text-gray-500">
                                            Lycée Technique
                                        </span>
                                    </li>

                                    <li class="flex justify-between px-3 py-3 text-sm">
                                        <b>Code École</b>
                                        <span class="text-gray-500">
                                            LT-025
                                        </span>
                                    </li>

                                    <li class="flex justify-between px-3 py-3 text-sm">
                                        <b>Province</b>
                                        <span class="text-gray-500">
                                            Haut-Katanga
                                        </span>
                                    </li>

                                </ul>

                            </div>
                        </div>


                        <!-- CHOIX -->

                        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                            @php
                                $conjoint = $employee->families->firstWhere(
                                    'type',
                                    \App\Enums\FamilyMemberType::CONJOINT
                                );

                                $pereConjoint = $employee->families->firstWhere(
                                    'type',
                                    \App\Enums\FamilyMemberType::PERE_CONJOINT
                                );

                                $mereConjoint = $employee->families->firstWhere(
                                    'type',
                                    \App\Enums\FamilyMemberType::MERE_CONJOINT
                                );
                            @endphp


                            {{-- =========================
                                 CONJOINT(E)
                            ========================== --}}
                            <div class="border-b border-gray-200 px-5 py-4">
                                <h4 class="font-semibold text-gray-800">
                                    Conjoint(e)
                                </h4>
                            </div>

                            <div class="p-5">

                                <ul class="divide-y divide-gray-200 rounded border border-gray-200">

                                    {{-- NOM --}}
                                    <li class="flex justify-between gap-3 px-3 py-3 text-sm">
                                        <b class="text-gray-700">
                                            Nom
                                        </b>

                                        <span class="text-right text-gray-500">
                    @if($conjoint)
                                                {{ $conjoint->prenom }} {{ $conjoint->nom }}
                                            @else
                                                —
                                            @endif
                </span>
                                    </li>

                                    {{-- TELEPHONE --}}
                                    <li class="flex justify-between gap-3 px-3 py-3 text-sm">
                                        <b class="text-gray-700">
                                            Téléphone
                                        </b>

                                        <span class="text-right text-gray-500">
                    {{ $conjoint?->telephone ?? '—' }}
                </span>
                                    </li>

                                    {{-- STATUT --}}
                                    <li class="flex justify-between gap-3 px-3 py-3 text-sm">
                                        <b class="text-gray-700">
                                            Statut
                                        </b>

                                        <span class="text-right">

                    @if($conjoint)

                                                @if($conjoint->statut_vie === \App\Enums\LifeStatus::EN_VIE)

                                                    <span class="inline-flex rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                {{ $conjoint->statut_vie->label() }}
                            </span>

                                                @else

                                                    <span class="inline-flex rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                {{ $conjoint->statut_vie->label() }}
                            </span>

                                                @endif

                                            @else
                                                —
                                            @endif

                </span>
                                    </li>

                                </ul>

                            </div>


                            {{-- =========================
                                 SEPARATOR
                            ========================== --}}
                            <div class="border-t border-gray-200"></div>


                            {{-- =========================
                                 BELLE-FAMILLE
                            ========================== --}}
                            <div class="border-b border-gray-200 px-5 py-4">
                                <h4 class="font-semibold text-gray-800">
                                    Belle-famille
                                </h4>
                            </div>

                            <div class="p-5">

                                <ul class="divide-y divide-gray-200 rounded border border-gray-200">

                                    {{-- PÈRE DU CONJOINT --}}
                                    <li class="flex justify-between gap-3 px-3 py-3 text-sm">

                                        <b class="text-gray-700">
                                            Père du conjoint
                                        </b>

                                        <span class="text-right text-gray-500">

                    @if($pereConjoint)

                                                <span class="font-medium text-gray-700">
                            {{ $pereConjoint->prenom }}
                                                    {{ $pereConjoint->nom }}
                        </span>

                                                <br>

                                                <span class="text-xs text-gray-400">
                            {{ $pereConjoint->telephone ?? 'Téléphone : —' }}
                        </span>

                                                <br>

                                                @if($pereConjoint->statut_vie === \App\Enums\LifeStatus::EN_VIE)

                                                    <span class="inline-flex rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                {{ $pereConjoint->statut_vie->label() }}
                            </span>

                                                @else

                                                    <span class="inline-flex rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                {{ $pereConjoint->statut_vie->label() }}
                            </span>

                                                @endif

                                            @else
                                                —
                                            @endif

                </span>

                                    </li>


                                    {{-- MÈRE DU CONJOINT --}}
                                    <li class="flex justify-between gap-3 px-3 py-3 text-sm">

                                        <b class="text-gray-700">
                                            Mère du conjoint
                                        </b>

                                        <span class="text-right text-gray-500">

                    @if($mereConjoint)

                                                <span class="font-medium text-gray-700">
                            {{ $mereConjoint->prenom }}
                                                    {{ $mereConjoint->nom }}
                        </span>

                                                <br>

                                                <span class="text-xs text-gray-400">
                            {{ $mereConjoint->telephone ?? 'Téléphone : —' }}
                        </span>

                                                <br>

                                                @if($mereConjoint->statut_vie === \App\Enums\LifeStatus::EN_VIE)

                                                    <span class="inline-flex rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                {{ $mereConjoint->statut_vie->label() }}
                            </span>

                                                @else

                                                    <span class="inline-flex rounded bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                {{ $mereConjoint->statut_vie->label() }}
                            </span>

                                                @endif

                                            @else
                                                —
                                            @endif

                </span>

                                    </li>

                                </ul>

                            </div>

                        </div>


                    </div>

                </div>


                <!-- =========================
                     ADMISSIONS
                ========================== -->
                <div id="admissions" class="tab-content hidden">

                    <div class="mt-5 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                        <div class="border-b border-gray-200 px-5 py-4">
                            <h4 class="font-semibold text-gray-800">
                                Admissions
                            </h4>
                        </div>

                        <div class="p-5">

                            <div class="overflow-x-auto">

                                <table class="min-w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-50">

                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            #
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Date
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Promotion
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Faculté
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Année
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Créé par
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Action
                                        </th>
                                    </tr>

                                    </thead>

                                    <tbody class="divide-y divide-gray-200">

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-4 py-3 text-sm">1</td>

                                        <td class="px-4 py-3 text-sm">
                                            12/08/2026
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            INFO-L2
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            Faculté des Sciences
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            2025-2026
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            Administrateur
                                        </td>

                                        <td class="px-4 py-3">

                                            <div class="flex gap-1">

                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded bg-blue-500 text-white hover:bg-blue-600"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </button>

                                                <button
                                                    class="flex h-8 w-8 items-center justify-center rounded bg-red-500 text-white hover:bg-red-600"
                                                >
                                                    <i class="fa fa-refresh"></i>
                                                </button>

                                            </div>

                                        </td>

                                    </tr>

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-4 py-3 text-sm">2</td>

                                        <td class="px-4 py-3 text-sm">
                                            10/09/2025
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            INFO-L1
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            Faculté des Sciences
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            2024-2025
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            Administrateur
                                        </td>

                                        <td class="px-4 py-3">

                                            <button
                                                class="flex h-8 w-8 items-center justify-center rounded bg-blue-500 text-white hover:bg-blue-600"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>

                                        </td>

                                    </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                </div>


                <!-- =========================
                     PERCEPTIONS
                ========================== -->
                <div id="perceptions" class="tab-content hidden">

                    <div class="mt-5 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

                        <div class="border-b border-gray-200 px-5 py-4">
                            <h4 class="font-semibold text-gray-800">
                                Perceptions
                            </h4>
                        </div>

                        <div class="p-5">

                            <div class="overflow-x-auto">

                                <table class="min-w-full divide-y divide-gray-200">

                                    <thead class="bg-gray-50">

                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            #
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Date
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Libellé
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Montant
                                        </th>

                                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500">
                                            Statut
                                        </th>

                                    </tr>

                                    </thead>

                                    <tbody class="divide-y divide-gray-200">

                                    <tr>

                                        <td class="px-4 py-3 text-sm">
                                            1
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            15/08/2026
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            Frais d'inscription
                                        </td>

                                        <td class="px-4 py-3 text-sm font-semibold">
                                            150 $
                                        </td>

                                        <td class="px-4 py-3">
                                            <span class="rounded bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                Payé
                                            </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td class="px-4 py-3 text-sm">
                                            2
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            20/08/2026
                                        </td>

                                        <td class="px-4 py-3 text-sm">
                                            Frais académiques
                                        </td>

                                        <td class="px-4 py-3 text-sm font-semibold">
                                            300 $
                                        </td>

                                        <td class="px-4 py-3">
                                            <span class="rounded bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-700">
                                                En attente
                                            </span>
                                        </td>

                                    </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>


<!-- =========================
     TABS
========================== -->
<script>
    function showTab(tabId, button) {

        document.querySelectorAll('.tab-content').forEach(function (tab) {
            tab.classList.add('hidden');
        });

        document.querySelectorAll('.tab-button').forEach(function (btn) {
            btn.classList.remove(
                'border-blue-600',
                'text-blue-600'
            );

            btn.classList.add(
                'border-transparent',
                'text-gray-500'
            );
        });

        document.getElementById(tabId).classList.remove('hidden');

        button.classList.remove(
            'border-transparent',
            'text-gray-500'
        );

        button.classList.add(
            'border-blue-600',
            'text-blue-600'
        );
    }
</script>
