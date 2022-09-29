import * as React from 'react';
import '../../elements/css/FPInput.scss';
import { useState, useRef, useEffect, useCallback, useMemo, useReducer } from 'react';
import styled from 'styled-components';
import { useDeleteLocationMutation, useGetLocationQuery, useInsertLocationMutation, useUpdateLocationMutation } from '../../../api/customLocationApi';
import { LocationChecked, LocationCity } from '../../../features/search/searchTownCity';
export const CustomLocation = () => {
  const [country, setCountry] = useState<LocationCity | undefined | string | any>('');
  const [city, setCity] = useState<LocationCity | undefined | string | any>('');
  const [lat, setLat] = useState<LocationCity | undefined | string | any>('');
  const [lng, setLng] = useState<LocationCity | undefined | string | any>('');
  const [id, setId] = useState<LocationCity | undefined | string | any>('');
  const { data: locationcity, isLoading, isSuccess, isFetching, isError } = useGetLocationQuery('fp_location');
  const [insertLocation] = useInsertLocationMutation();
  const [deleteLocation] = useDeleteLocationMutation();
  const [updatelocation] = useUpdateLocationMutation();

  const listHandle = (e, index, el) => {
    if (e.target.dataset.delete === 'delete') {
      e.currentTarget.remove();
    }
  };
  const listDelete = (e, index, el) => {
    deleteLocation({ id: Number(e.target.id) });
  };
  const listEdit = (e, index, el) => {
    setCountry(el.country);
    setCity(el.city);
    setLat(el.lat);
    setLng(el.lng);
    setId(el.id);
  };

  const listInsertUpdate = () => {
    // insert
    if (!id && country && city && lat && lng) {
      insertLocation({ country, city, lat, lng });
      setCountry('');
      setCity('');
      setLat('');
      setLng('');
      setId('');
      return;
    }
    // update
    if (id && country && city && lat && lng) {
      updatelocation({ id, country, city, lat, lng });
      setCountry('');
      setCity('');
      setLat('');
      setLng('');
      setId('');
    }
  };

  const addLocationHandle = (e) => {
    if (e.target.name === 'country') {
      setCountry(e.target.value);
    }
    if (e.target.name === 'city') {
      setCity(e.target.value);
    }
    if (e.target.name === 'lat') {
      setLat(e.target.value);
    }
    if (e.target.name === 'lng') {
      setLng(e.target.value);
    }
  };

  return (
    <Location__Container id='location__setting' className='vertical_tabcontent'>
      <p className='pheadline'>Custom Location Setting</p>
      <p>Location Address AutoComplete is the capital city of England.</p>
      <div className='location__col2'>
        <div className='FP__input__container'>
          <input className='FP__input' type='text' name='country' value={country} onChange={addLocationHandle} placeholder='Add Country' />
          <input className='FP__input' type='text' name='city' value={city} onChange={addLocationHandle} placeholder='Add Location,City' />
          <input className='FP__input' type='text' name='lat' value={lat} onChange={addLocationHandle} placeholder='Add Latitude,Lat' />
          <input className='FP__input' type='text' name='lng' value={lng} onChange={addLocationHandle} placeholder='Add Longitude,Lng' />
          <button className='middle_button' onClick={listInsertUpdate}>
            Add Location
          </button>
        </div>

        <div className='location__list'>
          <p>Your Custom List of Location,</p>
          {isFetching ? (
            <div className='ping'></div>
          ) : (
            <ul>
              {locationcity?.map((el, index) => (
                <List__Container key={index} onClick={(e) => listHandle(e, index, el)} className='list__item'>
                  <li className='fp__list' id={el.id} onClick={(e) => listEdit(e, index, el)}>
                    {' '}
                    {el.country} <span>{el.city}</span>
                  </li>
                  <div className='edit__delete'>
                    <span id={el.id} data-edit='edit' onClick={(e) => listEdit(e, index, el)}>
                      Edit
                    </span>
                    <span>|</span>
                    <span id={el.id} data-delete='delete' onClick={(e) => listDelete(e, index, el)}>
                      Delete
                    </span>
                  </div>
                </List__Container>
              ))}
            </ul>
          )}
        </div>
      </div>
    </Location__Container>
  );
};

const Location__Container = styled.section`
  .location__col2 {
    display: flex;
    width: 100%;
    margin-top: 20px;
    gap: 30px;
  }
  .FP__input__container {
    max-width: 350px;
  }
  .location__list {
    position: relative;
    min-width: 400px;
    border-radius: 3px;
    background-color: #f6f7f7;
    p {
      font-size: 16px;
      margin: 5px;
    }
  }
`;
const List__Container = styled.div`
  font-size: 16px;
.fp__list{
  margin: 0;
}
  display: flex;
  justify-content: space-between;
  background-color: white;
  margin: 5px;
  padding: 8px;
  box-shadow: #ced6df6b 1px 1px 4px 1px;

  :hover {
    background-color: #f9fbfc;
  }
  li {
    cursor: pointer;
  }
  li > span {
    color: var(--bbalp);
  }
  .edit__delete {
    display: flex;
    gap: 10px;
    font-weight: 500;
    cursor: pointer;
    span:first-of-type:hover {
      color: orange;
    }
    span:hover {
      color: red;
    }
  }
`;
