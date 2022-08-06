import { createSlice,current  } from "@reduxjs/toolkit";
import type { PayloadAction } from '@reduxjs/toolkit'


export interface IqamaDelayState {
  IQFajr:number[],
  IQZhuhr:number[],
  IQAsr:number[],
  IQMaghrib:number[],
  IQIsha:number[],
}


const initialState:IqamaDelayState = {
  IQFajr:[],
  IQZhuhr:[],
  IQAsr:[],
  IQMaghrib:[],
  IQIsha:[],
};

export const IqamaDelaySlice = createSlice({
  name: "IqamaDelay",
  initialState,
  reducers: {
  
    IQFajrVal: (state, { payload }) => {
      state.IQFajr = payload;
    },
    IQZhuhrVal: (state, { payload }) => {
      state.IQZhuhr = payload;
    },
    IQAsrVal: (state, { payload }) => {
      state.IQAsr = payload;
    },
    IQMaghribVal: (state, { payload }) => {
      state.IQMaghrib = payload;
    },
    IQIshaVal: (state, { payload }) => {
      state.IQIsha = payload;
    },
  
  },
});

// Action creators are generated for each case reducer function
export const {IQFajrVal,IQZhuhrVal,IQAsrVal,IQMaghribVal,IQIshaVal } = IqamaDelaySlice.actions;

export default IqamaDelaySlice.reducer;
