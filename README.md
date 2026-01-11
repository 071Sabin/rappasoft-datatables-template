# UsersTable Dark Theme Template

This repository contains a simple template-like implementation for Rappasoft Laravel Livewire Tables.

-   **What I did:** Created `UsersTable.php` in the [app/Livewire](app/Livewire/UsersTable.php) folder and built a table component focused on a dark-mode theme.
-   **Purpose:** Tweak a few public properties in the `UsersTable` component to change the dark-theme appearance of the table. Light theme will continue to use the package defaults.

Key properties to edit (current example values):

-   `public $color = 'stone';`
-   `public $thBg = 'bg-stone-900';`
-   `public $tableOddRowBg = 'bg-stone-700';`
-   `public $tableEvenRowBg = 'bg-stone-800';`

Changing these values will update the component's dark-mode styling. This component is intentionally minimal and designed as a starting point — adjust the Tailwind classes above to match the desired dark-theme palette.

## Reference

Rappasoft Laravel Livewire Tables documentation: https://rappasoft.com/docs/laravel-livewire-tables/v4/introduction

## File locations

-   Component: [app/Livewire/UsersTable.php](app/Livewire/UsersTable.php)
-   This README: [README.md](README.md)

## Next steps

-   Edit the four public properties in `UsersTable.php` to tune your dark theme.
-   Tell me if you want this change committed to a Git branch, or if you want additional examples for light/dark toggling.
-   Tell me if you want this change committed to a Git branch, or if you want additional examples for light/dark toggling.
