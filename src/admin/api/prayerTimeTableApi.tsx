// Need to use the React-specific entry point to import createApi
import {  SearchTownCityState } from '../features/search/searchTownCity';
import { emptySplitApi } from './emptySplitApi'
interface FPCalendar {
    currentDate: string[]; fajr: string[]; sunrise: string[]; dhuhr:string[]; className:string;
    asr: string[]; sunset:string[]; maghrib: string[]; isha: string[]; midnight:string[]; day:number[];today:number;
  }
  declare const prayerData;

export const prayerTimeTableApi = emptySplitApi.injectEndpoints({
    endpoints:(builder) =>({
        getPrayerTimeTable: builder.query<[],string>({
            query:(methods) => ({ url: `fp/v1/${methods}`, method: 'GET',headers:{
                'X-WP-Nonce': prayerData?.nonce,
            }}),
            providesTags:[{ type: "prayerTimeTableTag"}]
        }),
        updatePrayerTimeTable: builder.mutation<void,object[]>({
            query:({  ...put }) => ({ url: `fp/v1/fp_prayertimetable`, method: 'POST', body: put,headers:{
                'X-WP-Nonce': prayerData?.nonce,
            } }),
            invalidatesTags: [{ type: 'prayerTimeTableTag'}],
        }),
        
    }),
    overrideExisting: false,
})

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const {useGetPrayerTimeTableQuery,useUpdatePrayerTimeTableMutation} = prayerTimeTableApi;