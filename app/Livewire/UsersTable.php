<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public $color = 'stone';
    public $thBg = 'bg-stone-900';
    public $tableOddRowBg = 'bg-stone-700';
    public $tableEvenRowBg = 'bg-stone-800';

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setSearchIcon('heroicon-m-magnifying-glass');

        $this->setSearchIconAttributes([
            'style' => 'color: #D1D1D1',
        ]);

        $this->setComponentWrapperAttributes([
            'default' => true,
            'default-colors' => false,
            'class' => 'p-3 rounded-md dark:' . $this->tableEvenRowBg,
        ]);

        $this->setTableWrapperAttributes([
            'default' => true,
            'default-colors' => false,
            'class' => 'dark:' . $this->tableOddRowBg,
        ]);

        $this->setTableAttributes([
            'default' => true,
            'default-colors' => false,
            'class' => 'dark:' . $this->tableEvenRowBg,
        ]);

        $this->setThAttributes(function (Column $column) {

            return ['class' => 'dark:' . $this->thBg, 'default' => true];
        });

        $this->setTbodyAttributes([
            'default' => true,
            'default-colors' => false,
            'class' => 'dark:' . $this->tableEvenRowBg,
        ]);

        $this->setTrAttributes(function ($row, $index) {
            return [
                'default' => true,
                'default-colors' => false,
                'class' => $index % 2 === 0
                    ? 'dark:' . $this->tableOddRowBg
                    : 'dark:' . $this->tableEvenRowBg,
            ];
        });

        $this->setSearchFieldAttributes([
            'default' => true,
            'class' => ' px-2 border rounded-lg dark:' . $this->thBg,
        ]);

        $this->setBulkActionsThAttributes([
            'class' => 'dark:' . $this->thBg,
            'default' => true
        ]);

        $this->setBulkActionsButtonAttributes([
            'class' => 'border-none dark:' . $this->tableOddRowBg,
            'default-colors' => true,
            'default-styling' => true,
        ]);
        $this->setBulkActionsMenuAttributes([
            'class' => 'dark:' . $this->tableOddRowBg,
            'default-colors' => true,
            'default-styling' => true,
        ]);
        $this->setColumnSelectButtonAttributes([
            'class' => 'border-none dark:' . $this->tableOddRowBg,
            'default-colors' => true,
            'default-styling' => true,
        ]);


        // this is the bg of pop over after clicking filter button
        $this->setFilterPopoverAttributes([
            'class' => 'dark:' . $this->tableOddRowBg,
            'default-colors' => true,
            'default-styling' => true,
        ]);




        // this is the row per page drop down 10, 20, 30 50 etc... beside of clolumns menu
        $this->setPerPageFieldAttributes([
            'class' => 'py-2 px-1 dark:' . $this->tableOddRowBg, // Add these classes to the dropdown
            'default-styles' => true, // Output the default styling
        ]);

        $this->setTdAttributes(function (Column $column) {
            if ($column->getTitle() == 'reorder') {
                return [
                    'class' => 'dark:' . $this->tableEvenRowBg,
                    'default' => false,
                    // 'default-colors' => false,
                ];
            }
            return ['default' => true];
        });
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable()->searchable(),

            Column::make('Status', 'user_status')
                ->format(fn($value) => match ($value) {

                    'active' => '<span class="
                                    inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full
                                    bg-green-100 text-green-700
                                    border border-green-400
                                    dark:bg-green-900/30 dark:text-green-300 dark:border-green-500">
                                    Active
                                </span>',

                    'inactive' => '<span class="
                                    inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full
                                    bg-red-100 text-red-700
                                    border border-red-400
                                    dark:bg-red-900/30 dark:text-red-300 dark:border-red-500">
                                    Inactive
                                </span>',

                    default => '<span class="text-gray-500 dark:text-gray-400 text-xs">
                                    Unknown
                                </span>',
                })
                ->html(),
            Column::make("Created at", "created_at")->format(fn($value) => $value?->diffForHumans())
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
    public function filters(): array
    {
        return [
            SelectFilter::make('Status', 'user_status')
                ->setInputAttributes([
                    'class' => 'p-1 dark:' . $this->tableEvenRowBg . ' dark:text-' . $this->color . '-200',
                    'default-styling' => true,
                    // 'default' => true,
                ])
                ->options([
                    '' => 'All',
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                ])
                ->filter(function ($query, $value) {
                    if ($value === '') {
                        return;
                    }
                    $query->where('user_status', $value);
                }),
        ];
    }

    public function bulkActions(): array
    {
        return [
            'deleteSelected' => 'Delete Selected',
        ];
    }
    public function deleteSelected(): void
    {
        $ids = $this->getSelected();

        if (empty($ids)) {
            return;
        }

        \DB::transaction(function () use ($ids) {
            User::whereIn('id', $ids)->delete();
        });

        // Clear selection after delete
        $this->clearSelected();
    }
}