# AspectConstraint

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**aspect_data_type** | **string** | The data type of this aspect. For implementation help, refer to &lt;a href&#x3D;&#39;https://developer.ebay.com/devzone/rest/api-ref/taxonomy/types/AspectDataTypeEnum.html&#39;&gt;eBay API documentation&lt;/a&gt; | [optional] 
**aspect_enabled_for_variations** | **bool** | A value of true indicates that this aspect can be used to help identify item variations. | [optional] 
**aspect_format** | **string** | Returned only if the value of aspectDataType identifies a data type that requires specific formatting. Currently, this field provides formatting hints as follows: DATE: YYYY, YYYYMM, YYYYMMDD NUMBER: int32, double | [optional] 
**aspect_mode** | **string** | The manner in which values of this aspect must be specified by the seller (as free text or by selecting from available options). For implementation help, refer to &lt;a href&#x3D;&#39;https://developer.ebay.com/devzone/rest/api-ref/taxonomy/types/AspectModeEnum.html&#39;&gt;eBay API documentation&lt;/a&gt; | [optional] 
**aspect_required** | **bool** | A value of true indicates that this aspect is required when offering items in the specified category. | [optional] 
**item_to_aspect_cardinality** | **string** | Indicates whether this aspect can accept single or multiple values for items in the specified category. For implementation help, refer to &lt;a href&#x3D;&#39;https://developer.ebay.com/devzone/rest/api-ref/taxonomy/types/ItemToAspectCardinalityEnum.html&#39;&gt;eBay API documentation&lt;/a&gt; | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


