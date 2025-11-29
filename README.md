# ZimPriceCheck VueJS Tools

This plugin integrates various VueJS-based tools, calculators, and sales forms into WordPress via shortcodes. It pulls the latest updates from the Zimpricecheck API and provides a seamless experience for users.

## Features

The plugin functionality is divided into three main categories:

### 1. Calculators
Tools for currency conversion and price calculations.
*   **Omari Calculator**: A specialized calculator for specific transaction types.
*   **FX Calculator**: Foreign exchange rates calculator.

### 2. Charts
Visualizations for economic data.
*   **Rates Chart**: Displays the latest exchange rate trends.
*   **Inflation Chart**: Displays historical inflation data.

### 3. Sales Forms
E-commerce forms for purchasing various services.
*   **TelOne USD**: Cart for TelOne USD bundles.
*   **Liquid Home**: Cart for Liquid Home (Fibronix/Wibronix) bundles.
*   **USD Airtime**: Sales form for USD airtime.
*   **Pinless USD**: Direct top-up for USD airtime.
*   **ZESA Express**: Token purchase form for ZESA.
*   **NetOne Bundles**: Sales form for NetOne bundles.
*   **TelOne ZWL**: Cart for TelOne ZWL bundles.
*   **ZESA USD Express**: USD token purchase form for ZESA.

### 4. Utilities
*   **Join WhatsApp**: Adds a "Join WhatsApp" link/button to posts (currently disabled).

## Shortcodes

Use the following shortcodes to embed the tools in your pages or posts:

| Shortcode | Description | Module |
| :--- | :--- | :--- |
| `[omari-calculator]` | Displays the Omari Calculator. | `Calculators\OmariCalculator` |
| `[zim-fx-calc]` | Displays the FX Calculator. | `Calculators\FxCalculator` |
| `[zim-rates-chart]` | Displays the Exchange Rates Chart. | `Charts\RatesChart` |
| `[zim-inflation-chart]` | Displays the Inflation Rates Chart. | `Charts\InflationChart` |
| `[telone-usd]` | Displays the TelOne USD Cart. | `Sales\TelOneUsd` |
| `[lt-sales]` | Displays the Liquid Home Cart. | `Sales\LiquidHome` |
| `[usd-airtime-sales]` | Displays the USD Airtime Sales Form. | `Sales\UsdAirtime` |
| `[pinless-usd]` | Displays the Pinless USD Form. | `Sales\PinlessUsd` |
| `[zesaexpress]` | Displays the ZESA Express Form. | `Sales\ZesaExpress` |
| `[netone-bundles]` | Displays the NetOne Bundles Form. | `Sales\NetOneBundles` |
| `[telone-form]` | Displays the TelOne ZWL Cart. | `Sales\TelOneZwl` |
| `[zesa_usd]` | Displays the ZESA USD Express Form. | `Sales\ZesaUsdExpress` |

## Code Structure

The plugin follows a modular architecture to ensure maintainability and performance.

```
api-vuejs/
├── api-vuejs.php           # Main plugin entry point
├── README.md               # Documentation
├── assets/                 # Consolidated assets (JS, CSS) for all modules
│   ├── omari-calculator/
│   ├── fx-calc/
│   ├── ...
├── includes/
│   ├── Core/               # Core infrastructure
│   │   ├── Plugin.php      # Main class, handles lifecycle and hooks
│   │   ├── Autoloader.php  # PSR-4 Autoloader
│   │   └── AbstractModule.php # Base class for all modules
│   └── Modules/            # Feature modules grouped by category
│       ├── Calculators/
│       │   ├── OmariCalculator.php
│       │   └── FxCalculator.php
│       ├── Charts/
│       │   ├── RatesChart.php
│       │   └── InflationChart.php
│       ├── Sales/
│       │   ├── TelOneUsd.php
│       │   ├── LiquidHome.php
│       │   ├── ...
│       └── Utilities/
│           └── JoinWhatsApp.php
```

### Key Concepts
*   **Modules**: Each feature is encapsulated in a module class extending `AbstractModule`.
*   **Autoloading**: Classes are automatically loaded using a PSR-4 autoloader.
*   **Conditional Loading**: Assets (scripts and styles) are only enqueued when the corresponding shortcode is used on the page.
*   **Asset Organization**: All static assets are stored in the `assets/` directory, keeping the source code clean.
