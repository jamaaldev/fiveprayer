import { createSlice  } from "@reduxjs/toolkit";
import type { PayloadAction } from '@reduxjs/toolkit'

import methodsForCalc from "../../utils/json/MethodsForCalc.json";
import methodsHigherLats from "../../utils/json/Higher_Latitudes_Methods.json";
import methodsMidnightCalc from "../../utils/json/Midnight_Calculation_Mode.json";
import asrMedoths from "../../utils/json/AsrMedthods.json";



export type Generate = {
  id: string;
  month: number;
  city:string
}
export type LocationCity = {
  id:number,
  country:string, 
  city:string 
  lat:string,
  lng:string,
  meta:any;
  
}
export type NameAndMethod = {
  name: string;
  method: string;
}
export type ListCityTown = {
  country: string;
  lat: string;
  lng: string;
  city: string;
  id:number;

}
export type ListCityLocation = {
  country: string;
  lat: string;
  lng: string;
  city: string;
}

type Params = {
    Fajr:number;
    Isha:number | string;
    Maghrib?:number;
    Midnight?:string;
}
type Location  = {
    latitude:number;
    longitude:number;
}
export type CalCMethod = {
  id: number;
  name: string;
  params:Params;
  location:Location;
  method:string;
}

export interface SearchTownCityState {
  
  CityTown:Object[],
  CalcMethods:CalCMethod[],
  HigherLats:NameAndMethod[],
  MidnightMode:NameAndMethod[],
  AsrMedoths: NameAndMethod[],

  ListCity:ListCityTown[],
  check:string[],
  locationChecked:ListCityTown[],
  higherChecked:string,
  monthChecked:number,
  midnightChecked:string,
  medothChecked:string,
  asrChecked:string,
  
}


const initialState:SearchTownCityState = {

  CityTown: Object[''],
  CalcMethods: methodsForCalc,
  HigherLats: methodsHigherLats,
  MidnightMode: methodsMidnightCalc,
  AsrMedoths: asrMedoths,
  
  ListCity: [],
  check: [],
  locationChecked:[],
  higherChecked: '',
  monthChecked: Number(sessionStorage.getItem('month')) ? Number(sessionStorage.getItem('month')) : new Date().getMonth(),
  midnightChecked:'',
  asrChecked: '',
  medothChecked: '',
 
};

export const searchTownCitySlice = createSlice({
  name: "searchtowncity",
  initialState,
  reducers: {
    CityTownSearch: (state,  {payload}) => {
      state.CityTown = payload;
    },
    LocationChecked: (state, { payload }) => {
      state.locationChecked = payload;
    },
    MonthChecked: (state, { payload }) => {

      state.monthChecked = payload;
    },
    MidnightChecked: (state, { payload }) => {
      state.midnightChecked = payload;
    },
    AsrChecked: (state, { payload }) => {
      state.asrChecked = payload;
    },
    HigherChecked: (state, { payload }) => {
      state.higherChecked = payload;
    },
    MedothChecked: (state, { payload }) => {
      state.medothChecked = payload;
    },
   
  },
});

// Action creators are generated for each case reducer function
export const { CityTownSearch, LocationChecked,MonthChecked,AsrChecked,HigherChecked,MidnightChecked,MedothChecked } = searchTownCitySlice.actions;

export default searchTownCitySlice.reducer;
