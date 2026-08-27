<div class="min-h-screen py-4">

    <div class="mx-auto w-full px-4">

        {{-- =========================
             MAIN CARD
        ========================== --}}
        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">

            {{-- =========================
                 HEADER
            ========================== --}}
            <div class="border-b border-gray-200 px-5 py-4">

                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">
                            {{ __('Employee list') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-500">
                            {{ __('Manage your employees and their information.') }}
                        </p>
                    </div>

                    <flux:button
                        variant="primary"
                        icon="plus"
                        class="bg-blue-600! text-white! hover:bg-blue-700!"
                    >
                        {{ __('Add employee') }}
                    </flux:button>

                </div>

            </div>


            {{-- =========================
                 FILTERS
            ========================== --}}
            <div class="border-b border-gray-200 bg-gray-50 px-5 py-4">

                <div class="flex flex-col gap-3 lg:flex-row lg:items-center">

                    {{-- SEARCH --}}
                    <div class="w-full lg:w-72">

                        <flux:input
                            icon="magnifying-glass"
                            placeholder="{{ __('Search employees...') }}"
                            wire:model.live.debounce.300ms="search"
                            autocomplete="off"
                            autocorrect="off"
                            autocapitalize="off"
                            spellcheck="false"
                            class="
                                border-gray-300!
                                bg-white!
                                focus:border-blue-600!
                                focus:ring-2!
                                focus:ring-blue-600/20!
                                focus:outline-none!
                            "
                        />

                    </div>


                    {{-- DEPARTMENT --}}
                    <div class="w-full lg:w-48">

                        <flux:select
                            wire:model.live="departmentId"
                            class="
                                border-gray-300!
                                bg-white!
                                focus:border-blue-600!
                                focus:ring-2!
                                focus:ring-blue-600/20!
                            "
                        >

                            <flux:select.option value="">
                                {{ __('All departments') }}
                            </flux:select.option>

                            @foreach($departments as $department)

                                <flux:select.option value="{{ $department->id }}">
                                    {{ $department->name }}
                                </flux:select.option>

                            @endforeach

                        </flux:select>

                    </div>


                    {{-- GENDER --}}
                    <div class="w-full lg:w-40">

                        <flux:select
                            wire:model.live="genre"
                            class="
                                border-gray-300!
                                bg-white!
                                focus:border-blue-600!
                                focus:ring-2!
                                focus:ring-blue-600/20!
                            "
                        >

                            <flux:select.option value="">
                                {{ __('All genders') }}
                            </flux:select.option>

                            @foreach($genres as $employeeGender)

                                <flux:select.option
                                    value="{{ $employeeGender->value }}"
                                >
                                    {{ $employeeGender->label() }}
                                </flux:select.option>

                            @endforeach

                        </flux:select>

                    </div>


                    {{-- FAMILY STATUS --}}
                    <div class="w-full lg:w-48">

                        <flux:select
                            wire:model.live="situationFamiliale"
                            class="
                                border-gray-300!
                                bg-white!
                                focus:border-blue-600!
                                focus:ring-2!
                                focus:ring-blue-600/20!
                            "
                        >

                            <flux:select.option value="">
                                {{ __('All family statuses') }}
                            </flux:select.option>

                            @foreach($maritalStatuses as $maritalStatus)

                                <flux:select.option
                                    value="{{ $maritalStatus->value }}"
                                >
                                    {{ $maritalStatus->label() }}
                                </flux:select.option>

                            @endforeach

                        </flux:select>

                    </div>


                    {{-- LIFE STATUS --}}
                    <div class="w-full lg:w-40">

                        <flux:select
                            wire:model.live="statutVie"
                            class="
                                border-gray-300!
                                bg-white!
                                focus:border-blue-600!
                                focus:ring-2!
                                focus:ring-blue-600/20!
                            "
                        >

                            <flux:select.option value="">
                                {{ __('All statuses') }}
                            </flux:select.option>

                            @foreach($lifeStatuses as $lifeStatus)

                                <flux:select.option
                                    value="{{ $lifeStatus->value }}"
                                >
                                    {{ $lifeStatus->label() }}
                                </flux:select.option>

                            @endforeach

                        </flux:select>

                    </div>


                    {{-- RESET FILTERS --}}
                    @if(
                        filled($search) ||
                        filled($departmentId) ||
                        filled($statutVie) ||
                        filled($genre) ||
                        filled($situationFamiliale)
                    )

                        <flux:button
                            variant="ghost"
                            size="sm"
                            icon="arrow-path"
                            wire:click="resetFilters"
                            wire:loading.attr="disabled"
                            class="
                                shrink-0
                                text-blue-600!
                                hover:bg-blue-50!
                                hover:text-blue-700!
                            "
                        >
                            {{ __('Reset') }}
                        </flux:button>

                    @endif

                </div>

            </div>


            {{-- =========================
                 TABLE
            ========================== --}}
            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    {{-- TABLE HEADER --}}
                    <thead class="bg-gray-50">

                    <tr>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Employee') }}
                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Department') }}
                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Gender') }}
                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Date of birth') }}
                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Phone') }}
                        </th>

                        <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Status') }}
                        </th>

                        <th class="px-4 py-3 text-right text-xs font-semibold uppercase text-gray-500 sm:px-5">
                            {{ __('Action') }}
                        </th>

                    </tr>

                    </thead>


                    {{-- TABLE BODY --}}
                    <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse($employees as $employee)

                        <tr
                            wire:key="employee-{{ $employee->id }}"
                            class="transition-colors hover:bg-gray-50"
                        >

                            {{-- EMPLOYEE --}}
                            <td class="px-4 py-4 sm:px-5">

                                <div class="flex items-center gap-3">

                                    {{-- AVATAR --}}
                                    <div
                                        class="
                                            flex
                                            h-10
                                            w-10
                                            shrink-0
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-blue-100
                                            text-xs
                                            font-semibold
                                            text-blue-700
                                        "
                                    >
                                        {{
                                            strtoupper(
                                                substr($employee->prenom ?? '', 0, 1) .
                                                substr($employee->nom ?? '', 0, 1)
                                            )
                                        }}
                                    </div>


                                    {{-- NAME --}}
                                    <div class="min-w-0">

                                        <p class="truncate font-medium text-gray-800">

                                            {{ $employee->prenom }}

                                            {{ $employee->nom }}

                                            @if($employee->post_nom)
                                                {{ $employee->post_nom }}
                                            @endif

                                        </p>

                                        <p class="mt-0.5 truncate text-xs text-gray-500">
                                            {{ $employee->matricule ?? '—' }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- DEPARTMENT --}}
                            <td class="px-4 py-4 sm:px-5">

                                <span class="text-sm text-gray-600">
                                    {{ $employee->department?->name ?? '—' }}
                                </span>

                            </td>


                            {{-- GENDER --}}
                            <td class="px-4 py-4 sm:px-5">

                                <span class="text-sm text-gray-600">

                                    {{ $employee->genre?->label() ?? $employee->genre ?? '—' }}

                                </span>

                            </td>


                            {{-- DATE OF BIRTH --}}
                            <td class="px-4 py-4 sm:px-5">

                                @if($employee->date_naissance)

                                    <span class="text-sm text-gray-600">
                                        {{ $employee->date_naissance->format('d/m/Y') }}
                                    </span>

                                @else

                                    <span class="text-sm text-gray-400">
                                        —
                                    </span>

                                @endif

                            </td>


                            {{-- PHONE --}}
                            <td class="px-4 py-4 sm:px-5">

                                <span class="text-sm text-gray-600">
                                    {{ $employee->telephone ?? '—' }}
                                </span>

                            </td>


                            {{-- STATUS --}}
                            <td class="px-4 py-4 sm:px-5">

                                @if(
                                    $employee->statut_vie ===
                                    \App\Enums\LifeStatus::EN_VIE
                                )

                                    <span
                                        class="
                                            inline-flex
                                            rounded
                                            bg-green-100
                                            px-2.5
                                            py-1
                                            text-xs
                                            font-medium
                                            text-green-700
                                        "
                                    >
                                        {{ $employee->statut_vie->label() }}
                                    </span>

                                @else

                                    <span
                                        class="
                                            inline-flex
                                            rounded
                                            bg-red-100
                                            px-2.5
                                            py-1
                                            text-xs
                                            font-medium
                                            text-red-700
                                        "
                                    >
                                        {{ $employee->statut_vie?->label() ?? '—' }}
                                    </span>

                                @endif

                            </td>


                            {{-- ACTION --}}
                            <td class="px-4 py-4 text-right sm:px-5">

                                <div class="flex items-center justify-end gap-1">

                                    {{-- VIEW --}}
                                    <a
                                        href="{{ route('employees.show', $employee) }}"
                                        class="
                                            flex
                                            h-8
                                            w-8
                                            items-center
                                            justify-center
                                            rounded
                                            bg-blue-100
                                            text-blue-700
                                            transition
                                            hover:bg-blue-200
                                        "
                                        title="{{ __('View') }}"
                                    >
                                        <i class="fa fa-eye text-xs"></i>
                                    </a>


                                    {{-- EDIT --}}
                                    <button
                                        type="button"
                                        class="
                                            flex
                                            h-8
                                            w-8
                                            items-center
                                            justify-center
                                            rounded
                                            bg-gray-100
                                            text-gray-600
                                            transition
                                            hover:bg-gray-200
                                        "
                                        title="{{ __('Edit') }}"
                                    >
                                        <i class="fa fa-edit text-xs"></i>
                                    </button>


                                    {{-- DELETE --}}
                                    <button
                                        type="button"
                                        class="
                                            flex
                                            h-8
                                            w-8
                                            items-center
                                            justify-center
                                            rounded
                                            bg-red-100
                                            text-red-600
                                            transition
                                            hover:bg-red-200
                                        "
                                        title="{{ __('Delete') }}"
                                    >
                                        <i class="fa fa-trash text-xs"></i>
                                    </button>

                                </div>

                            </td>

                        </tr>


                    @empty

                        {{-- EMPTY STATE --}}
                        <tr>

                            <td
                                colspan="7"
                                class="px-5 py-12 text-center"
                            >

                                <div class="flex flex-col items-center">

                                    <div
                                        class="
                                            mb-3
                                            flex
                                            h-12
                                            w-12
                                            items-center
                                            justify-center
                                            rounded-full
                                            bg-blue-100
                                            text-blue-600
                                        "
                                    >
                                        <i class="fa fa-users"></i>
                                    </div>

                                    <p class="font-medium text-gray-800">

                                        @if(
                                            filled($search) ||
                                            filled($departmentId) ||
                                            filled($statutVie) ||
                                            filled($genre) ||
                                            filled($situationFamiliale)
                                        )

                                            {{ __('No employees found') }}

                                        @else

                                            {{ __('No employees registered') }}

                                        @endif

                                    </p>

                                    <p class="mt-1 text-sm text-gray-500">

                                        @if(
                                            filled($search) ||
                                            filled($departmentId) ||
                                            filled($statutVie) ||
                                            filled($genre) ||
                                            filled($situationFamiliale)
                                        )

                                            {{ __('Try changing your filters.') }}

                                        @else

                                            {{ __('Start by adding an employee.') }}

                                        @endif

                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{-- =========================
                 PAGINATION
            ========================== --}}
            @if($employees->hasPages())

                <div
                    class="
                        flex
                        flex-col
                        gap-4
                        border-t
                        border-gray-200
                        px-5
                        py-4
                        sm:flex-row
                        sm:items-center
                        sm:justify-between
                    "
                >

                    {{-- COUNT --}}
                    <div class="text-xs text-gray-500">

                        {{ __('Showing') }}

                        <span class="font-semibold text-gray-700">
                            {{ $employees->firstItem() }}
                        </span>

                        –

                        <span class="font-semibold text-gray-700">
                            {{ $employees->lastItem() }}
                        </span>

                        {{ __('of') }}

                        <span class="font-semibold text-gray-700">
                            {{ $employees->total() }}
                        </span>

                        {{ __('employees') }}

                    </div>


                    {{-- PAGINATION --}}
                    <div class="flex items-center gap-1">

                        {{-- PREVIOUS --}}
                        @if($employees->onFirstPage())

                            <span
                                class="
                                    flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded
                                    border
                                    border-gray-200
                                    text-gray-300
                                "
                            >
                                <i class="fa fa-chevron-left text-xs"></i>
                            </span>

                        @else

                            <button
                                type="button"
                                wire:click="previousPage"
                                wire:loading.attr="disabled"
                                class="
                                    flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded
                                    border
                                    border-gray-200
                                    bg-white
                                    text-gray-600
                                    transition
                                    hover:border-blue-600
                                    hover:text-blue-600
                                "
                            >
                                <i class="fa fa-chevron-left text-xs"></i>
                            </button>

                        @endif


                        {{-- PAGE NUMBERS --}}
                        @php
                            $currentPage = $employees->currentPage();
                            $lastPage = $employees->lastPage();

                            $startPage = max(1, $currentPage - 2);
                            $endPage = min($lastPage, $currentPage + 2);
                        @endphp


                        {{-- FIRST PAGE --}}
                        @if($startPage > 1)

                            <button
                                type="button"
                                wire:click="gotoPage(1)"
                                wire:loading.attr="disabled"
                                class="
                                    flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded
                                    text-xs
                                    font-medium
                                    text-gray-600
                                    transition
                                    hover:bg-blue-50
                                    hover:text-blue-600
                                "
                            >
                                1
                            </button>

                            @if($startPage > 2)

                                <span
                                    class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        text-xs
                                        text-gray-400
                                    "
                                >
                                    ...
                                </span>

                            @endif

                        @endif


                        {{-- PAGES --}}
                        @for($page = $startPage; $page <= $endPage; $page++)

                            @if($page == $currentPage)

                                <span
                                    class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        rounded
                                        bg-blue-600
                                        text-xs
                                        font-semibold
                                        text-white
                                    "
                                >
                                    {{ $page }}
                                </span>

                            @else

                                <button
                                    type="button"
                                    wire:click="gotoPage({{ $page }})"
                                    wire:loading.attr="disabled"
                                    class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        rounded
                                        text-xs
                                        font-medium
                                        text-gray-600
                                        transition
                                        hover:bg-blue-50
                                        hover:text-blue-600
                                    "
                                >
                                    {{ $page }}
                                </button>

                            @endif

                        @endfor


                        {{-- LAST PAGE --}}
                        @if($endPage < $lastPage)

                            @if($endPage < $lastPage - 1)

                                <span
                                    class="
                                        flex
                                        h-8
                                        w-8
                                        items-center
                                        justify-center
                                        text-xs
                                        text-gray-400
                                    "
                                >
                                    ...
                                </span>

                            @endif

                            <button
                                type="button"
                                wire:click="gotoPage({{ $lastPage }})"
                                wire:loading.attr="disabled"
                                class="
                                    flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded
                                    text-xs
                                    font-medium
                                    text-gray-600
                                    transition
                                    hover:bg-blue-50
                                    hover:text-blue-600
                                "
                            >
                                {{ $lastPage }}
                            </button>

                        @endif


                        {{-- NEXT --}}
                        @if($employees->hasMorePages())

                            <button
                                type="button"
                                wire:click="nextPage"
                                wire:loading.attr="disabled"
                                class="
                                    flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded
                                    border
                                    border-gray-200
                                    bg-white
                                    text-gray-600
                                    transition
                                    hover:border-blue-600
                                    hover:text-blue-600
                                "
                            >
                                <i class="fa fa-chevron-right text-xs"></i>
                            </button>

                        @else

                            <span
                                class="
                                    flex
                                    h-8
                                    w-8
                                    items-center
                                    justify-center
                                    rounded
                                    border
                                    border-gray-200
                                    text-gray-300
                                "
                            >
                                <i class="fa fa-chevron-right text-xs"></i>
                            </span>

                        @endif

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>
