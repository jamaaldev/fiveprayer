import { createSlice } from "@reduxjs/toolkit";
import type { PayloadAction } from '@reduxjs/toolkit'

export interface PrayerState {
  value: number,
  listMonth:string[],
  selectList:Array<string>
  calendar:string[],
}

const initialState: PrayerState = {
  value: 0,
  listMonth: new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"),
  selectList: [],
  calendar:[],
};

export const prayerSlice = createSlice({
  name: "prayer",
  initialState,
  reducers: {
    monthNumber: (state) => {
      state.listMonth = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    },
    Calender: (state,{payload}) => {
      state.calendar = payload;
    },
 /*    optSelect: (state) => {
      state.selectList = state.listMonth.map(
        (el, indexed) =>
          `
        <option key={${indexed}} className="BPlabel" value={${indexed}}>
          {${el}}
        </option>
        `,
      );
    }, */
  },
});

// Action creators are generated for each case reducer function
export const { monthNumber,Calender } = prayerSlice.actions;

export default prayerSlice.reducer;
