import { emptySplitApi } from './emptySplitApi';
declare const prayerData;
export const prayerSettingsMetaAPI = emptySplitApi.injectEndpoints({
  endpoints: (builder) => ({
    getprayerSettingsMetaAPI: builder.query({
      query: (methods ) => ({ url: `fp/v1/${methods}`, method: 'GET',headers:{
       
        'X-WP-Nonce': prayerData?.nonce,

     } }),
      providesTags: [{ type: 'prayerSettingsMetaTag' }],
    }),
    insertprayerSettingsMetaAPI: builder.mutation({
      query: ({ prayersettingschecked, ...put }) => ({ url: `fp/v1/fp_prayersettings_meta`, method: 'POST', body: put,headers:{
       
         'X-WP-Nonce': prayerData?.nonce,

      } }),
      invalidatesTags: [{ type: 'prayerSettingsMetaTag' }],
    }),
    updateprayerSettingsMetaAPI: builder.mutation({
      query: ({ prayersettingschecked, ...put }) => ({ url: `fp/v1/fp_prayersettings_meta`, method: 'POST', body: put,headers:{
        'X-WP-Nonce': prayerData?.nonce,
        'X-HTTP-Method-Override': 'PUT'
      } }),
      invalidatesTags: [{ type: 'prayerSettingsMetaTag' }],
    }),
  }),
  overrideExisting: false,
});

// Export hooks for usage in functional components, which are
// auto-generated based on the defined endpoints
export const { useGetprayerSettingsMetaAPIQuery, useInsertprayerSettingsMetaAPIMutation, useUpdateprayerSettingsMetaAPIMutation } = prayerSettingsMetaAPI;
