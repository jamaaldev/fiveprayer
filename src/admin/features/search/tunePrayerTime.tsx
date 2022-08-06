import { createSlice,current  } from "@reduxjs/toolkit";
import type { PayloadAction } from '@reduxjs/toolkit'


export interface TunePrayerTimeState {
  TPTimeImsak:number[],
  TPTimeFajr:number[],
  TPTimeSunrise:number[],
  TPTimeZhuhr:number[],
  TPTimeAsr:number[],
  TPTimeSunset:number[],
  TPTimeMaghrib:number[],
  TPTimeIsha:number[],
  TPTimeMidnight:number[],
}


const initialState:TunePrayerTimeState = {
  TPTimeImsak:[],
  TPTimeFajr:[],
  TPTimeSunrise:[],
  TPTimeZhuhr:[],
  TPTimeAsr:[],
  TPTimeSunset:[],
  TPTimeMaghrib:[],
  TPTimeIsha:[],
  TPTimeMidnight:[],
};

export const TunePrayerTimeSlice = createSlice({
  name: "TunePrayerTime",
  initialState,
  reducers: {
  
    TPTimeImsakVal: (state, { payload }) => {
      state.TPTimeImsak = payload;
    },
    TPTimeFajrVal: (state, { payload }) => {
        state.TPTimeFajr = payload;
    },
    TPTimeSunriseVal: (state, { payload }) => {
      state.TPTimeSunrise = payload;
    },
    TPTimeZhuhrVal: (state, { payload }) => {
      state.TPTimeZhuhr = payload;
    },
    TPTimeAsrVal: (state, { payload }) => {
      state.TPTimeAsr = payload;
    },
    TPTimeSunsetVal: (state, { payload }) => {
      state.TPTimeSunset = payload;
    },
    TPTimeMaghribVal: (state, { payload }) => {
      state.TPTimeMaghrib = payload;
    },
    TPTimeIshaVal: (state, { payload }) => {
      state.TPTimeIsha = payload;
    },
    TPTimeMidnightVal: (state, { payload }) => {
      state.TPTimeMidnight = payload;
    },
  
  },
});

// Action creators are generated for each case reducer function
export const {TPTimeImsakVal,TPTimeFajrVal,TPTimeSunriseVal,TPTimeZhuhrVal,TPTimeAsrVal,TPTimeSunsetVal,TPTimeMaghribVal,TPTimeIshaVal,TPTimeMidnightVal } = TunePrayerTimeSlice.actions;

export default TunePrayerTimeSlice.reducer;
