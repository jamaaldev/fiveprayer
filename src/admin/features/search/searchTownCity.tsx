import { createSlice,current  } from "@reduxjs/toolkit";
import type { PayloadAction } from '@reduxjs/toolkit'

// import cities from "cities.json";
// import calcMethods from "../../utils/json/calcMethods.json";
import methodsForCalc from "../../utils/json/MethodsForCalc.json";
import methodsHigherLats from "../../utils/json/Higher_Latitudes_Methods.json";
import methodsMidnightCalc from "../../utils/json/Midnight_Calculation_Mode.json";
import asrMedoths from "../../utils/json/AsrMedthods.json";
// const countryCodes = require("country-codes-list");
// const cityTimezones = require("city-timezones");
// const cities = require("cities15k.json");


export type Generate = {
  id: string;
  month: number;
  city:string
}
export type LocationCity = {
  id:string,
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
  id:string;
  

  
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
  
  CityTown:string,
  CalcMethods:CalCMethod[],
  HigherLats:NameAndMethod[],
  MidnightMode:NameAndMethod[],
  AsrMedoths: NameAndMethod[],
  
  // Cities:any,
  ListCity:ListCityTown[],
  check:string[],
  locationChecked:ListCityTown,
  higherChecked:string,
  monthChecked:number,
  midnightChecked:string,
  medothChecked:string,
  asrChecked:string,
  CountryCode:string[],
 /*  IQFajr:number[],
  IQZhuhr:number[],
  IQAsr:number[],
  IQMaghrib:number[],
  IQIsha:number[], */
}


const initialState:SearchTownCityState = {
 /*  IQFajr:[],
  IQZhuhr:[],
  IQAsr:[],
  IQMaghrib:[],
  IQIsha:[], */
  CityTown: "",
  
  CalcMethods: methodsForCalc,
  HigherLats: methodsHigherLats,
  MidnightMode: methodsMidnightCalc,
  AsrMedoths: asrMedoths,
  // Cities: cities,
  ListCity: [],
  check: [],
  // locationchecked expecting object value this will fix the ts error
  locationChecked:{country:'', lat:'', lng:'', city:'', id:'',meta:null},
  higherChecked: '',
  monthChecked: Number(localStorage.getItem('month')) ? Number(localStorage.getItem('month')) : new Date().getMonth(),
  midnightChecked:'',
  asrChecked: '',
  medothChecked: '',
  // CountryCode: [countryCodes.customList("countryCode", "[{countryCode}] {countryNameEn}: +{countryCallingCode}")],
};

export const searchTownCitySlice = createSlice({
  name: "searchtowncity",
  initialState,
  reducers: {
    CityTownSearch: (state,  {payload}: PayloadAction<string> ) => {
      state.CityTown = payload;
      // state.CityTown = state.CityTown.charAt(0).toUpperCase() + state.CityTown.slice(1);
  /*     let place:[] = state.Cities?.filter((el:ListCityTown, 
      ) => el.name === state.CityTown );
      state.check = cityTimezones.lookupViaCity(state.CityTown);
        let countryName:ListCityTown;
      for (countryName of place) {
        countryName.nameOfCountry = state.CountryCode.map((name) => name[countryName.country]);
        state.ListCity = place.map(el => el);
      } */
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
    /* IQFajrVal: (state, { payload }) => {
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
    }, */
    DropReset: (state, { payload }) => {},
  },
});

// Action creators are generated for each case reducer function
export const { CityTownSearch, LocationChecked,MonthChecked,AsrChecked,HigherChecked,MidnightChecked,MedothChecked, DropReset,/* IQFajrVal,IQZhuhrVal,IQAsrVal,IQMaghribVal,IQIshaVal */ } = searchTownCitySlice.actions;

export default searchTownCitySlice.reducer;
