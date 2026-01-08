# Laravel Livewire Users DataTable (Dark Theme)

A customized **Rappasoft Laravel Livewire DataTable (v4)** built using the **User model**, featuring a fully adjustable **dark theme**.  
All styling is controlled through simple color variables, allowing global theme changes with minimal effort.

📖 Official Rappasoft Documentation:  
https://rappasoft.com/docs/laravel-livewire-tables/v4/introduction

---

## Overview

This Livewire DataTable implementation:

- Uses the **User** Eloquent model
- Comes with a **dark theme** applied across the table
- Allows **easy color customization** via variables
- Supports **searching, sorting, and pagination**
- Is fully reusable and extendable

---

## File Structure
app/
└── Livewire/
└── UsersTable.php


All configuration, logic, and theme customization are handled inside `UsersTable.php`.

---

## Component Description

### UsersTable.php

The `UsersTable` Livewire component:

- Extends Rappasoft’s Livewire Table base class
- Fetches data from the **User model**
- Defines searchable and sortable columns
- Applies a consistent **dark UI theme**
- Uses centralized color variables for styling

---

## Dark Theme Customization

The table styling is driven by **color variables**, making it easy to adjust the entire UI from one place.

### Example Theme Variables

```php
protected string $headerBgColor = '#1F2937';
protected string $rowBgColor    = '#111827';
protected string $textColor     = '#FFFFFF';
protected string $hoverBgColor  = '#374151';
```

**Requirements**
Laravel 8 or higher
Livewire installed
Rappasoft Laravel Livewire Tables v4

Learn More

For advanced usage such as filters, bulk actions, and performance optimizations, refer to the official documentation:

https://rappasoft.com/docs/laravel-livewire-tables/v4/introduction
