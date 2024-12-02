import { __ } from '@wordpress/i18n';

// background image sizes
export const backgroundSizes = (
	[
		{ label: __('Select Background Size', 'opry-plugin'), value: '' },
		{ label: __('auto', 'opry-plugin'), value: 'auto' },
		{ label: __('cover', 'opry-plugin'), value: 'cover' },
		{ label: __('contain', 'opry-plugin'), value: 'contain' },
		{ label: __('initial', 'opry-plugin'), value: 'initial' },
		{ label: __('inherit', 'opry-plugin'), value: 'inherit' }
	]
);

// background image positions
export const backgroundPositions = (
	[
		{ label: __('Select Position', 'opry-plugin'), value: '' },
		{ label: __('inherit', 'opry-plugin'), value: 'inherit' },
		{ label: __('initial', 'opry-plugin'), value: 'initial' },
		{ label: __('bottom', 'opry-plugin'), value: 'bottom' },
		{ label: __('center', 'opry-plugin'), value: 'center' },
		{ label: __('left', 'opry-plugin'), value: 'left' },
		{ label: __('right', 'opry-plugin'), value: 'right' },
		{ label: __('top', 'opry-plugin'), value: 'top' },
		{ label: __('unset', 'opry-plugin'), value: 'unset' },
		{ label: __('center center', 'opry-plugin'), value: 'center center' },
		{ label: __('left top', 'opry-plugin'), value: 'left top' },
		{ label: __('left center', 'opry-plugin'), value: 'left center' },
		{ label: __('left bottom', 'opry-plugin'), value: 'left bottom' },
		{ label: __('right top', 'opry-plugin'), value: 'right top' },
		{ label: __('right center', 'opry-plugin'), value: 'right center' },
		{ label: __('right bottom', 'opry-plugin'), value: 'right bottom' },
		{ label: __('center top', 'opry-plugin'), value: 'center top' },
		{ label: __('center bottom', 'opry-plugin'), value: 'center bottom' },
	]
);

export const backgroundBlendmodes = (
	[
		{ label: __('Normal', 'opry-plugin'), value: 'normal' },
		{ label: __('Multiply', 'opry-plugin'), value: 'multiply' },
		{ label: __('Screen', 'opry-plugin'), value: 'screen' },
		{ label: __('Overlay', 'opry-plugin'), value: 'overlay' },
		{ label: __('Darken', 'opry-plugin'), value: 'darken' },
		{ label: __('Lighten', 'opry-plugin'), value: 'lighten' },
		{ label: __('Color Dodge', 'opry-plugin'), value: 'color-dodge' },
		{ label: __('Color Burn', 'opry-plugin'), value: 'color-burn' },
		{ label: __('Hard Light', 'opry-plugin'), value: 'hard-light' },
		{ label: __('Soft Light', 'opry-plugin'), value: 'soft-light' },
		{ label: __('Difference', 'opry-plugin'), value: 'difference' },
		{ label: __('Exclusion', 'opry-plugin'), value: 'exclusion' },
		{ label: __('Hue', 'opry-plugin'), value: 'hue' },
		{ label: __('Saturation', 'opry-plugin'), value: 'saturation' },
		{ label: __('Color', 'opry-plugin'), value: 'color' },
		{ label: __('Luminosity', 'opry-plugin'), value: 'luminosity' },
	]
);