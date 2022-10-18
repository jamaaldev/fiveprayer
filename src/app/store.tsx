import { configureStore } from "@reduxjs/toolkit";
// Or from '@reduxjs/toolkit/query/react'
import { setupListeners } from "@reduxjs/toolkit/query";
import { customLocationApi } from "../admin/api/customLocationApi";
import { prayerTimeTableApi } from "../admin/api/prayerTimeTableApi";
import prayerReducer from "../admin/features/calendars/prayerTimeCalendar";
import searchTownCityReducer from "../admin/features/search/searchTownCity";
import IqamaDelayReducer from "../admin/features/search/IqamaDelay";
import TunePrayerTimeReducer from "../admin/features/search/tunePrayerTime";
import { emptySplitApi } from "../admin/api/emptySplitApi";
export const store = configureStore({
  reducer: {
    prayer: prayerReducer,
    searchtowncity: searchTownCityReducer,
    IqamaDelay: IqamaDelayReducer,
    TunePrayerTime:TunePrayerTimeReducer,
    // Add the generated reducer as a specific top-level slice
    [customLocationApi.reducerPath]: customLocationApi.reducer,
    [prayerTimeTableApi.reducerPath]: prayerTimeTableApi.reducer,
  },
  // Adding the api middleware enables caching, invalidation, polling,
  // and other useful features of `rtk-query`.
  middleware: (getDefaultMiddleware) => getDefaultMiddleware({
    immutableCheck: false,
    serializableCheck: false,
  }).concat(emptySplitApi.middleware),
  
});

// optional, but required for refetchOnFocus/refetchOnReconnect behaviors
// see `setupListeners` docs - takes an optional callback as the 2nd arg for customization
setupListeners(store.dispatch);

// Infer the `RootState` and `AppDispatch` types from the store itself
export type RootState = ReturnType<typeof store.getState>
// Inferred type: {posts: PostsState, comments: CommentsState, users: UsersState}
export type AppDispatch = typeof store.dispatch