import * as React from 'react';
import { useSelector } from 'react-redux';
import styled from 'styled-components';
import { RootState } from '../../../../../app/store';
import { useGetprayerSettingsMetaAPIQuery } from '../../../../api/prayerSettingsMetaAPI';
import FPInput from '../../../elements/FPInput';
import '../../../elements/css/FPCustomUpload.scss';
import { BoxModel } from '../../../elements/BoxModel';
export interface IIqamahDelayProps {}

export function IqamahDelay( props: IIqamahDelayProps ) {
	const { data: getprayersettingMeta } = useGetprayerSettingsMetaAPIQuery(
		'fp_prayersettings_meta'
	);
	const [ show, SetShow ] = React.useState< boolean >( false );
	const { IQFajr, IQDhuhr, IQAsr, IQMaghrib, IQIsha } = useSelector(
		( state: RootState ) => state.IqamaDelay
	);

	const UploadFile = () => {
		SetShow( true );
	};
	//IQFajr
	if (
		sessionStorage.getItem( 'IQFajr' ) === null &&
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQFajr'
		)[ 0 ]?.[ 'meta-key' ] === 'IQFajr'
	) {
		const num = getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQFajr'
		)[ 0 ]?.value;

		sessionStorage.setItem(
			'IQFajr',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQFajr'
			)[ 0 ]?.value
		);
	} else if (
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQFajr'
		)[ 0 ]?.[ 'meta-key' ] === 'IQFajr'
	) {
		sessionStorage.setItem(
			'IQFajr',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQFajr'
			)[ 0 ]?.value
		);
	}
	//IQDhuhr
	if (
		sessionStorage.getItem( 'IQDhuhr' ) === null &&
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQDhuhr'
		)[ 0 ]?.[ 'meta-key' ] === 'IQDhuhr'
	) {
		const num = getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQDhuhr'
		)[ 0 ]?.value;

		sessionStorage.setItem(
			'IQDhuhr',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQDhuhr'
			)[ 0 ]?.value
		);
	} else if (
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQDhuhr'
		)[ 0 ]?.[ 'meta-key' ] === 'IQDhuhr'
	) {
		sessionStorage.setItem(
			'IQDhuhr',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQDhuhr'
			)[ 0 ]?.value
		);
	}
	//IQAsr
	if (
		sessionStorage.getItem( 'IQAsr' ) === null &&
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQAsr'
		)[ 0 ]?.[ 'meta-key' ] === 'IQAsr'
	) {
		const num = getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQAsr'
		)[ 0 ]?.value;

		sessionStorage.setItem(
			'IQAsr',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQAsr'
			)[ 0 ]?.value
		);
	} else if (
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQAsr'
		)[ 0 ]?.[ 'meta-key' ] === 'IQAsr'
	) {
		sessionStorage.setItem(
			'IQAsr',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQAsr'
			)[ 0 ]?.value
		);
	}
	//IQMaghrib
	if (
		sessionStorage.getItem( 'IQMaghrib' ) === null &&
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQMaghrib'
		)[ 0 ]?.[ 'meta-key' ] === 'IQMaghrib'
	) {
		const num = getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQMaghrib'
		)[ 0 ]?.value;

		sessionStorage.setItem(
			'IQMaghrib',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQMaghrib'
			)[ 0 ]?.value
		);
	} else if (
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQMaghrib'
		)[ 0 ]?.[ 'meta-key' ] === 'IQMaghrib'
	) {
		sessionStorage.setItem(
			'IQMaghrib',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQMaghrib'
			)[ 0 ]?.value
		);
	}
	//IQIsha
	if (
		sessionStorage.getItem( 'IQIsha' ) === null &&
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQIsha'
		)[ 0 ]?.[ 'meta-key' ] === 'IQIsha'
	) {
		const num = getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQIsha'
		)[ 0 ]?.value;

		sessionStorage.setItem(
			'IQIsha',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQIsha'
			)[ 0 ]?.value
		);
	} else if (
		getprayersettingMeta?.filter(
			( el ) => el?.[ 'meta-key' ] === 'IQIsha'
		)[ 0 ]?.[ 'meta-key' ] === 'IQIsha'
	) {
		sessionStorage.setItem(
			'IQIsha',
			getprayersettingMeta?.filter(
				( el ) => el?.[ 'meta-key' ] === 'IQIsha'
			)[ 0 ]?.value
		);
	}

	return (
		<div className="FP__iqamah">
			<Right_Container_IQamah>
				<p className="pInputHeadLine">
					Iqamah delay (in minutes)
					<br />
				</p>
				<Container>
					<FPInput
						val={ sessionStorage.getItem( 'IQFajr' ) }
						holder={ 'IQFajr' }
					/>
					<FPInput
						val={ sessionStorage.getItem( 'IQDhuhr' ) }
						holder={ 'IQDhuhr' }
					/>
				</Container>
				<Container>
					<FPInput
						val={ sessionStorage.getItem( 'IQAsr' ) }
						holder={ 'IQAsr' }
					/>
					<FPInput
						val={ sessionStorage.getItem( 'IQMaghrib' ) }
						holder={ 'IQMaghrib' }
					/>
				</Container>
				<Container>
					<FPInput
						val={ sessionStorage.getItem( 'IQIsha' ) }
						holder={ 'IQIsha' }
					/>
					<div className="middle_container">
						<label>Upload CSV Timings</label>
						{ /* <input title='sdsdsd' type="file" className="middle_button FP__custom-file-input"/> */ }
						<button
							onClick={ UploadFile }
							className="middle_button"
						>
							Upload FivePrayer
						</button>
					</div>
				</Container>
				{ show ? (
					<BoxModel showPopup={ 'block' } SetShow={ SetShow } />
				) : (
					''
				) }
			</Right_Container_IQamah>
		</div>
	);
}

const Right_Container_IQamah = styled.div`
	width: auto;
	flex: 1;
	margin-top: 22px;
	justify-content: space-between;
	align-items: center;
	.pInputHeadLine {
		font-size: 16px;
		font-weight: 300;
		color: var( --bbcolor );
		line-height: 1.4;
		padding-block: 20px;
	}
`;

const Container = styled.main`
	display: flex;
	margin-block: 15px;
	gap: 14px;
	align-items: baseline;
`;
