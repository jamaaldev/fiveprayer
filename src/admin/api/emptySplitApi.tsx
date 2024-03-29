// Or from '@reduxjs/toolkit/query' if not using the auto-generated hooks
import { createApi, fetchBaseQuery } from '@reduxjs/toolkit/query/react';

// initialize an empty api service that we'll inject endpoints into later as needed
export const emptySplitApi = createApi( {
	reducerPath: 'FPMainPluginApi',
	baseQuery: fetchBaseQuery( { baseUrl: `${ location.origin }/wp-json/` } ),
	tagTypes: [
		'prayerTimeTableTag',
		'locationTag',
		'prayerSettingsMetaTag',
		'getInofWordpressTag',
	],
	endpoints: () => ( {} ),
} );
