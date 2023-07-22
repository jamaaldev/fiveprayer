// Copyright (C) 2022 Jamaal
//
// This file is part of FivePrayer.
//
// FivePrayer is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// FivePrayer is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with FivePrayer.  If not, see <http://www.gnu.org/licenses/>.

import * as React from 'react';
import CalendarMonthly from './CalendarMonthly';
import { HexAlphaColorPicker } from 'react-colorful';
import 'react-toastify/dist/ReactToastify.css';
import '../../css/ColorPicker.scss';
import { useInsertprayerSettingsMetaAPIMutation } from '../../../../../api/prayerSettingsMetaAPI';
import CalendarDaily from '../daily/CalendarDaily';
import { ToastContainer, toast } from 'react-toastify';
export interface ITimeTableMonthlyProps {}
declare const FivePrayerStyleMonth;
export function TimeTableMonthly( props: ITimeTableMonthlyProps ) {
	const [ insertprayersettingmeta ] =
		useInsertprayerSettingsMetaAPIMutation();

	const [ switchColor, setSwitchColor ] = React.useState( true );
	const [ switchMonthDaily, setSwitchMonthDaily ] = React.useState( true );
	// End Switch
	const [ colorFirstHeadBg, setColorFirstHeadBg ] = React.useState(
		FivePrayerStyleMonth?.firstbg
	);
	const [ colorFirstHeadClr, setColorFirstHeadClr ] = React.useState(
		FivePrayerStyleMonth?.firstclr
	);
	const [ colorFirstHeadBgSave, setColorFirstHeadBgSave ] = React.useState(
		{}
	);
	const [ colorFirstHeadClrSave, setColorFirstHeadClrSave ] = React.useState(
		{}
	);
	// end first
	const [ colorSecondHeadBg, setColorSecondHeadBg ] = React.useState(
		FivePrayerStyleMonth?.secondbg
	);
	const [ colorSecondHeadClr, setColorSecondHeadClr ] = React.useState(
		FivePrayerStyleMonth?.secondclr
	);
	const [ colorSecondHeadBgSave, setColorSecondHeadBgSave ] = React.useState(
		{}
	);
	const [ colorSecondHeadClrSave, setColorSecondHeadClrSave ] =
		React.useState( {} );
	// end second
	// Start EvenRow
	const [ colorEvenRowBg, setColorEvenRowBg ] = React.useState(
		FivePrayerStyleMonth?.evenrowbg
	);
	const [ colorEvenRowClr, setColorEvenRowClr ] = React.useState(
		FivePrayerStyleMonth?.evenrowclr
	);
	const [ colorEvenRowBgSave, setColorEvenRowBgSave ] = React.useState( {} );
	const [ colorEvenRowClrSave, setColorEvenRowClrSave ] = React.useState(
		{}
	);

	// End EventRow

	// Start Highlight
	const [ colorHighLightRowBg, setColorHighLightRowBg ] = React.useState(
		FivePrayerStyleMonth?.highlightrowbg
	);
	const [ colorHighLightRowCrl, setColorHighLightRowCrl ] = React.useState(
		FivePrayerStyleMonth?.highlightrowclr
	);
	const [ colorHighLightRowBgSave, setColorHighLightRowBgSave ] =
		React.useState( {} );
	const [ colorHighLightRowClrSave, setColorHighLightRowClrSave ] =
		React.useState( {} );
	// End HighLight

	const saveColor = async () => {
		if ( colorFirstHeadBgSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorFirstHeadBgSave );
				toast.success( 'Your Style FirstBg Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorFirstHeadBgSave( {} );
			} catch ( error ) {}
		}

		if ( colorFirstHeadClrSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorFirstHeadClrSave );
				toast.success( 'Your Style FirstClr Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorFirstHeadClrSave( {} );
			} catch ( error ) {}
		}

		if ( colorSecondHeadBgSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorSecondHeadBgSave );
				toast.success( 'Your Style SecondBg Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorSecondHeadBgSave( {} );
			} catch ( error ) {}
		}

		if ( colorSecondHeadClrSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorSecondHeadClrSave );
				toast.success( 'Your Style SecondClr Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorSecondHeadClrSave( {} );
			} catch ( error ) {}
		}

		if ( colorEvenRowBgSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorEvenRowBgSave );
				toast.success( 'Your Style EvenBg Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorEvenRowBgSave( {} );
			} catch ( error ) {}
		}
		if ( colorEvenRowClrSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorEvenRowClrSave );
				toast.success( 'Your Style EvenClr Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorEvenRowClrSave( {} );
			} catch ( error ) {}
		}
		if ( colorHighLightRowBgSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorHighLightRowBgSave );
				toast.success( 'Your Style HighLightBg Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorHighLightRowBgSave( {} );
			} catch ( error ) {}
		}
		if ( colorHighLightRowClrSave.hasOwnProperty( 'value' ) ) {
			try {
				await insertprayersettingmeta( colorHighLightRowClrSave );
				toast.success( 'Your Style HighLightClr Saved! Refresh it.', {
					position: 'top-right',
					autoClose: 5000,
					hideProgressBar: false,
					closeOnClick: true,
					pauseOnHover: true,
					draggable: true,
					progress: undefined,
					theme: 'light',
				} );
				setColorHighLightRowClrSave( {} );
			} catch ( error ) {}
		}
	};
	const firstHeadBg = ( value, meta ) => {
		setColorFirstHeadBg( value );
		const colorSet = { value: value, meta: meta };
		setColorFirstHeadBgSave( colorSet );
	};
	const firstHeadClr = ( value, meta ) => {
		setColorFirstHeadClr( value );
		const colorSet = { value: value, meta: meta };
		setColorFirstHeadClrSave( colorSet );
	};
	// End FirstHead

	// Start SecondHead
	const secondHeadBg = ( value, meta ) => {
		setColorSecondHeadBg( value );
		const colorSet = { value: value, meta: meta };
		setColorSecondHeadBgSave( colorSet );
	};
	const secondHeadClr = ( value, meta ) => {
		setColorSecondHeadClr( value );
		const colorSet = { value: value, meta: meta };
		setColorSecondHeadClrSave( colorSet );
	};
	// End SecondHead

	const eventRowBg = ( value, meta ) => {
		setColorEvenRowBg( value );
		const colorSet = { value: value, meta: meta };
		setColorEvenRowBgSave( colorSet );
	};
	const eventRowClr = ( value, meta ) => {
		setColorEvenRowClr( value );
		const colorSet = { value: value, meta: meta };
		setColorEvenRowClrSave( colorSet );
	};
	const eventRowHighlightBg = ( value, meta ) => {
		setColorHighLightRowBg( value );
		const colorSet = { value: value, meta: meta };
		setColorHighLightRowBgSave( colorSet );
	};
	const eventRowHighlightClr = ( value, meta ) => {
		setColorHighLightRowCrl( value );
		const colorSet = { value: value, meta: meta };
		setColorHighLightRowClrSave( colorSet );
	};
	return (
		<div>
			<div id="Customizing" className="tabcontent">
				<ToastContainer
					position="top-right"
					autoClose={ 5000 }
					hideProgressBar={ false }
					newestOnTop={ false }
					closeOnClick
					rtl={ false }
					pauseOnFocusLoss
					draggable
					pauseOnHover
					theme="light"
				/>
				<h3>TimeTable</h3>
				<p>Customizing TimeTable Theme</p>
				<div className="container">
					<div className="month-daily">
						<button
							className={
								switchMonthDaily
									? 'active-month'
									: 'month-select'
							}
							onClick={ () => setSwitchMonthDaily( true ) }
						>
							Monthly
						</button>
						<button
							className={
								! switchMonthDaily
									? 'active-month'
									: 'month-select'
							}
							onClick={ () => setSwitchMonthDaily( false ) }
						>
							Daily
						</button>
					</div>
					<div className="color-switch">
						<button
							className={
								switchColor ? 'active-clr' : 'color-select'
							}
							onClick={ () => setSwitchColor( true ) }
						>
							Bg-Color
						</button>
						<button
							className={
								! switchColor ? 'active-clr' : 'color-select'
							}
							onClick={ () => setSwitchColor( false ) }
						>
							Ft-Color
						</button>
						<button
							className="save-theme"
							onClick={ () => saveColor() }
						>
							Save Theme
						</button>
					</div>
					<div className="clr-picker">
						{ /* Start First */ }
						{ switchMonthDaily ? (
							switchColor ? (
								<div className="first-bg">
									<span>First Head bg-color</span>
									<HexAlphaColorPicker
										color={ colorFirstHeadBg }
										onChange={ ( value ) =>
											firstHeadBg( value, 'firstbg' )
										}
									/>
								</div>
							) : (
								<div className="first-clr">
									<span>First Head ft-Color</span>
									<HexAlphaColorPicker
										color={ colorFirstHeadClr }
										onChange={ ( value ) =>
											firstHeadClr( value, 'firstclr' )
										}
									/>
								</div>
							)
						) : (
							''
						) }
						{ /* End First */ }

						{ /* Start Second */ }
						{ switchColor ? (
							<div className="second-bg">
								<span>Second Head bg-Color</span>
								<HexAlphaColorPicker
									color={ colorSecondHeadBg }
									onChange={ ( value ) =>
										secondHeadBg( value, 'secondbg' )
									}
								/>
							</div>
						) : (
							<div className="second-clr">
								<span>Second Head ft-Color</span>
								<HexAlphaColorPicker
									color={ colorSecondHeadClr }
									onChange={ ( value ) =>
										secondHeadClr( value, 'secondclr' )
									}
								/>
							</div>
						) }
						{ /* End Second */ }
						{ /* Start Even */ }

						{ switchMonthDaily ? (
							switchColor ? (
								<div className="even-bg">
									<span>Even Row bg-Color</span>
									<HexAlphaColorPicker
										color={ colorEvenRowBg }
										onChange={ ( value ) =>
											eventRowBg( value, 'evenbg' )
										}
									/>
								</div>
							) : (
								<div className="even-clr">
									<span>Even Row ft-Color</span>
									<HexAlphaColorPicker
										color={ colorEvenRowClr }
										onChange={ ( value ) =>
											eventRowClr( value, 'evenclr' )
										}
									/>
								</div>
							)
						) : (
							''
						) }

						{ /* End Even */ }

						{ switchColor ? (
							<div className="highlight-bg">
								<span>HightLight Row bg-Color</span>
								<HexAlphaColorPicker
									color={ colorHighLightRowBg }
									onChange={ ( value ) =>
										eventRowHighlightBg(
											value,
											'highlightbg'
										)
									}
								/>
							</div>
						) : (
							<div className="highlight-clr">
								<span>HightLight Row ft-Color</span>
								<HexAlphaColorPicker
									color={ colorHighLightRowCrl }
									onChange={ ( value ) =>
										eventRowHighlightClr(
											value,
											'highlightcrl'
										)
									}
								/>
							</div>
						) }
					</div>
					<div className="calendar-prayer">
						{ switchMonthDaily ? (
							<CalendarMonthly
								firstBg={ colorFirstHeadBg }
								firstClr={ colorFirstHeadClr }
								secondBg={ colorSecondHeadBg }
								secondClr={ colorSecondHeadClr }
								rowEvenBg={ colorEvenRowBg }
								rowEvenClr={ colorEvenRowClr }
								rowHighlightBg={ colorHighLightRowBg }
								rowHighlightClr={ colorHighLightRowCrl }
							/>
						) : (
							<CalendarDaily
								secondBg={ colorSecondHeadBg }
								secondClr={ colorSecondHeadClr }
								rowHighlightBg={ colorHighLightRowBg }
								rowHighlightClr={ colorHighLightRowCrl }
							/>
						) }
					</div>
				</div>
			</div>
		</div>
	);
}
