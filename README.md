# Users DataTable – Dark Theme (Laravel Livewire + Rappasoft)

A reusable **dark-themed Users DataTable** built with **Laravel Livewire** and **Rappasoft Laravel Livewire Tables v4**.  
This component is designed to be **copied, reused, and customized** by simply changing **colors, columns, or features**.

Everything is contained inside **one Livewire component** and optimized for **Tailwind CSS dark mode**.

---

## Component Path

app/  
└── Livewire/  
  └── UsersTable.php

---

## Purpose

This DataTable provides a **production-ready dark UI** for displaying users with:

- Centralized theme control
- Search & sort support
- Status filtering
- Bulk delete actions
- Pagination controls
- Human-readable timestamps
- Tailwind-based badge rendering

You can **copy this file**, change color variables or column definitions, and reuse it for any model.

---

## Model Used

User model:

App\Models\User

To use a different model, simply replace:

protected $model = User::class;

---

## Theme System (Dark Mode)

The dark theme is controlled using **public properties**, making it extremely easy to customize.

### Theme Variables

public $color = 'stone';  
public $thBg = 'bg-stone-900';  
public $tableOddRowBg = 'bg-stone-700';  
public $tableEvenRowBg = 'bg-stone-800';

### What These Control

- Table header background
- Odd and even row colors
- Filter dropdown background
- Search input styling
- Bulk action menus
- Pagination dropdown
- Filter popover background

To switch theme colors, just change `stone` to any Tailwind color  
(e.g. `slate`, `zinc`, `neutral`, `gray`).

---

## Table Configuration

The `configure()` method overrides **all default Rappasoft styles** and applies a consistent dark UI.

### Configured Features

- Primary key set to `id`
- Pagination options: 10, 25, 50, 100
- Custom search icon
- Styled search input
- Styled table wrapper
- Styled headers (`th`)
- Styled body (`tbody`)
- Alternating row colors
- Styled bulk action checkbox header
- Styled bulk action button & menu
- Styled column selector
- Styled filter popover
- Styled per-page dropdown
- Conditional `td` styling override

All default colors are disabled using:

'default-colors' => false

---

## Columns

The table defines the following columns:

### ID
- Sortable

### Name
- Searchable
- Sortable

### Email
- Searchable
- Sortable

### Status
- Rendered as HTML
- Color-coded badges:
  - Active → Green
  - Inactive → Red
  - Unknown → Muted text
- Fully dark-mode compatible

### Created At
- Human-readable (`diffForHumans`)
- Sortable

### Updated At
- Sortable

### Example Column Definition

Column::make("Name", "name")
    ->sortable()
    ->searchable();

You can add or remove columns freely.

---

## Filters

### Status Filter

A dropdown filter for `user_status`:

- All
- Active
- Inactive

The filter:
- Matches the dark theme
- Applies the query only when a value is selected
- Uses `SelectFilter`

You can add more filters (number, date, text) easily.

---

## Bulk Actions

### Delete Selected

Allows deleting multiple users at once.

### Behavior

- Retrieves selected row IDs
- Runs deletion inside a database transaction
- Clears selection after deletion

### Bulk Action Definition

public function bulkActions(): array
{
    return [
        'deleteSelected' => 'Delete Selected',
    ];
}

---

## Usage

Render the table in any Blade view:

<livewire:users-table />

---

## Customization Guide

### Change Theme Color

Change:

public $color = 'stone';

To:

slate / zinc / neutral / gray / any Tailwind color

---

### Use Another Model

Replace:

protected $model = User::class;

With your own model.

---

### Add New Columns

Add new `Column::make()` entries inside `columns()`.

---

### Add More Filters

Add additional filters inside `filters()` using:

- SelectFilter
- NumberFilter
- DateFilter

---

### Add More Bulk Actions

Define new methods and register them in `bulkActions()`.

---

## Requirements

- Laravel 8+
- Livewire
- Rappasoft Laravel Livewire Tables v4
- Tailwind CSS with dark mode enabled

---

## Reference

Official Rappasoft Documentation:  
https://rappasoft.com/docs/laravel-livewire-tables/v4/introduction
