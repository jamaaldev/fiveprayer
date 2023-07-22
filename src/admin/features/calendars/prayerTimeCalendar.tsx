import { createSlice } from '@reduxjs/toolkit';

export interface PrayerState {
	value: number;
	listMonth: string[];
	selectList: Array< string >;
	calendar: string[];
	isWait: boolean;
}

const initialState: PrayerState = {
	value: 0,
	listMonth: new Array(
		'January',
		'February',
		'March',
		'April',
		'May',
		'June',
		'July',
		'August',
		'September',
		'October',
		'November',
		'December'
	),
	selectList: [],
	calendar: [],
	isWait: true,
};

export const prayerSlice = createSlice( {
	name: 'prayer',
	initialState,
	reducers: {
		monthNumber: ( state ) => {
			state.listMonth = new Array(
				'January',
				'February',
				'March',
				'April',
				'May',
				'June',
				'July',
				'August',
				'September',
				'October',
				'November',
				'December'
			);
		},
		Calender: ( state, { payload } ) => {
			state.calendar = payload;
		},
		isWaitMoment: ( state, { payload } ) => {
			state.isWait = payload;
		},
	},
} );

// Action creators are generated for each case reducer function
export const { monthNumber, Calender, isWaitMoment } = prayerSlice.actions;

export default prayerSlice.reducer;
