import { createSlice } from '@reduxjs/toolkit';

export interface IqamaDelayState {
	IQFajr: number[];
	IQDhuhr: number[];
	IQAsr: number[];
	IQMaghrib: number[];
	IQIsha: number[];
}

const initialState: IqamaDelayState = {
	IQFajr: [],
	IQDhuhr: [],
	IQAsr: [],
	IQMaghrib: [],
	IQIsha: [],
};

export const IqamaDelaySlice = createSlice( {
	name: 'IqamaDelay',
	initialState,
	reducers: {
		IQFajrVal: ( state, { payload } ) => {
			state.IQFajr = payload;
		},
		IQDhuhrVal: ( state, { payload } ) => {
			state.IQDhuhr = payload;
		},
		IQAsrVal: ( state, { payload } ) => {
			state.IQAsr = payload;
		},
		IQMaghribVal: ( state, { payload } ) => {
			state.IQMaghrib = payload;
		},
		IQIshaVal: ( state, { payload } ) => {
			state.IQIsha = payload;
		},
	},
} );

// Action creators are generated for each case reducer function
export const { IQFajrVal, IQDhuhrVal, IQAsrVal, IQMaghribVal, IQIshaVal } =
	IqamaDelaySlice.actions;

export default IqamaDelaySlice.reducer;
